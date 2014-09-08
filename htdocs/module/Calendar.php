<?php

/**
 * show calendar entries from defined in a yaml file. first the future events, then the past ones.
 * events get unpublished after two years
 *
 * content/calendar.yaml format (* optional fields):
 *  - start : 20140810
 *    end* : 20140811
 *    date* : Samedi 11 octobre
 *    title : test of the website
 *    url* : actualite/nouvelles/20140811_test
 *    content* : |
 *      this is the content of the page
 *      [with a link](test/blah)
 *
 *      and an ![image](url.png)
 */

// use function Aoloe\debug as debug;

class Calendar extends Aoloe\Module_abstract {
    private $calendar_file = 'content/calendar.yaml';
    private $calendar = null;
    private $unpublish_age = 63072000; // 60*60*24*365*2 = 2 years
    private $sidebar = null;
    public function set_sidebar($sidebar) {$this->sidebar = $sidebar;}
    public function __construct() {
        if (file_exists($this->calendar_file)) {
            $this->calendar = file_get_contents($this->calendar_file);
            $this->calendar = Spyc::YAMLLoadString($this->calendar);
        }
        // debug('calendar', $this->calendar);
    }
    public function get_content() {
        $result = "";
        // Aoloe\debug('calendar', $this->calendar);

        include_once('module/Page.php');
        $module = new Page();
        $module->set_site($this->site);
        $module->set_sidebar($this->sidebar);
        $module->set_page_url($this->page_url);
        if (isset($parameter)) {
            foreach ($parameter as $key => $value) {
                if (method_exists(get_class($module), 'set_'.$key)) {
                    // debug('key', $key);
                    // debug('value', $value);
                    $module->{'set_'.$key}($value);
                }
            }
        }
        if (isset($filter)) {
            $module->set_filter($filter);
        }
        $result .= $module->get_content();



        $template = new Aoloe\Template();
        $event = array();
        $event_past = array();
        $event_now = date('Ymd');
        // Aoloe\debug('event_now', $event_now);
        foreach ($this->calendar as $item) {
            $event_item = array();
            $item = $this->get_filled($item);

            // Aoloe\debug('item', $item);
            $date = getdate(strtotime($item['date']));
            // Aoloe\debug('date', $date);
            $event_item['show_title'] = $item['event'] || !$item['training'];
            $event_item['no_training'] = (!$item['event'] && !$item['training']);
            $event_item['day'] = $date['mday'];
            $event_item['month'] = $this->german_month[$date['mon'] - 1];
            $event_item['title'] = $item['title'];
            if ($item['date'] >= $event_now) {
                $event[] = $event_item;
            } elseif ($item['event']) {
                $event_past[] = $event_item;
            }
        }
        // Aoloe\debug('event', $event);
        // Aoloe\debug('event_past', $event_past);
        $template->set('event', $event);
        $template->set('event_past', $event_past);
        $result .= $template->fetch('template/page_calendar.php');
        // Aoloe\debug('result', $result);
        return $result;
    }

    public function get_teaser() {
        $result =  array();
        // Aoloe\debug('calendar', $this->calendar);
        $event_now = date('Ymd');
        $i = 0;
        foreach ($this->calendar as $item) {
            if ($i < 3 && ($item['date'] > $event_now)) {
                $i++;
                $item = $this->get_filled($item);
                $event = $this->date_iso_to_german($item['date']);
                if ($item['event']) {
                    $event .= ', '.$item['start'].' '.$item['title'];
                } else {
                    $event .= $item['training'] ? ', '.substr($item['start'], 0, 2).' Uhr' : ': kein Training';
                }
                // $result = 
                // <li>Freitag 29. August, 20 Uhr</li>
                // <li>Freitag 5. September : kein Training <a href="javascript:void(0)" class="responsive_button">Mehr lesen...</a></li>
                $result[] = $event;
            }
        }
        // Aoloe\debug('result', $result);
        return $result;
    }

    public function get_ribbon() {
        $result =  array();
        // Aoloe\debug('calendar', $this->calendar);
        $event_now = date('Ymd');
        $i = 0;
        foreach ($this->calendar as $item) {
            if ($i < 4 && ($item['date'] > $event_now)) {
                $i++;
                $event = array();
                $item = $this->get_filled($item);
                $date = getdate(strtotime($item['date']));
                $event['no_training'] = (!$item['event'] && !$item['training']);
                $event['day'] = $date['mday'];
                $event['month'] = $this->german_month_short[$date['mon'] - 1];
                $event['title'] = $item['title'];
                $result[] = $event;
            }
        }
        // Aoloe\debug('result', $result);
        return $result;
    }

    private $german_day = array ('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag');
    private $german_month = array ('Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember');

    private $german_month_short = array ('Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez');
    
    private function date_iso_to_german($date) {
        $date = getdate(strtotime($date));
        // Aoloe\debug('date', $date);
        $result = $this->german_day[$date['wday'] - 1].' '.$date['mday'].'. '.$this->german_month[$date['mon'] - 1];
        return $result;
    }

    /**
     * set default values for the entries that are not defined
     */
    private function get_filled($item) {
        return array_merge(
            array (
                'start' => '20:00',
                'end' => '22:00',
                'event' => false,
                'training' => true,
        
                'title' => (array_key_exists('training', $item) && !$item['training'] ? 'Kein ' : '').'Training',
                'location' => 'Kanti Urdorf',
                'description' => '',
            ),
            $item
        );
    }
}

