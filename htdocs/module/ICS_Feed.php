<?php
/**
 * Inspired by https://gist.github.com/jakebellacera/635416
 */
class ICS_Feed extends Aoloe\Module_abstract {
    public function get_content() {
        include_once('module/Calendar.php');
        $calendar = new Calendar();
        $event = array();
        foreach ($calendar->get() as $item) {
            // Aoloe\debug('item', $item);
            $event[] = array (
                'start' => $this->get_ics_date_from_iso($item['date'].' '.$item['start']),
                'end' => $this->get_ics_date_from_iso($item['date'].' '.$item['end']),
                'id' => uniqid(), // TODO: really? shouldn't it be always the same id for the same item? use a hash of item?
                'id' => base64_encode($item['date'].$item['title']).'@bc-oberurdorf.ch',
                'timestamp' => $this->get_ics_date_from_iso($calendar->get_modification_date()),
                'location' => $this->get_string_escaped($item['location']),
                'description' => $this->get_string_escaped(empty($item['description']) ? $item['title'] : $item['description']),
                'url' => 'http://bc-oberurdorf.ch/programm', // TOOO: or something else?
                'summary' => $this->get_string_escaped($item['title']),
            );
        }
        // Aoloe\debug('event', $event);
        
        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . 'bc-oberurdorf.ics');

        $template = new Aoloe\Template();
        $template->set('event', $event);
        echo(str_replace("\n", "\r\n", $template->fetch('template/ics_feed.php')));

        return null;
    }

    /** Converts an ISO date time to an ics-friendly format */
    private function get_ics_date_from_iso($isodate = null) {
      return gmdate('Ymd\THis\Z', isset($isodate) ? strtotime($isodate) : time());
    }
     
    /** @return string the string escaped for ICS files */
    private function get_string_escaped($string) {
      return preg_replace('/([\,;])/','\\\$1', $string);
    }
}
