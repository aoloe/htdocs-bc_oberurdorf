<?php

// use function Aoloe\debug as debug;

class Page extends Aoloe\Module_abstract {
    private $page_content = null;
    private $sidebar = null;
    public function set_sidebar($sidebar) {$this->sidebar = $sidebar;}
    public function set_page_content($content) {$this->page_content = $content;}
    public function get_content() {
        $markdown = new Aoloe\Markdown();

        $template = new Aoloe\Template();

        $page_content = "";
        $sidebar_content = null;
        if (isset($this->page_content)) {
            $page_content = $this->page_content;
        } else {
            $markdown->clear();
            $markdown->set_url_img_prefix($this->site->get_path_relative('content/'));
            $markdown->set_url_a_prefix($this->site->get_path_relative());
            // debug('language', $this->language);
            // Aoloe\debug('page_url', $this->page_url);
            // debug('filter', $this->filter);
            $file_name = 'content/page/'.$this->page_url.'.md';
            if (file_exists($file_name)) {
                $page_content =  $markdown->parse($file_name);
            } else {
                // Aoloe\debug('page_url', $this->page_url);
                $page_content = $this->page_url.' hat kein Inhalt.';
            }
            /*
            if (isset($this->filter)) {
                if (file_exists($file_name)) {
                    include_once('library/Filter.php');
                    $page_content = file_get_contents($file_name);
                    foreach ($this->filter as $item) {
                        $filter = new Filter();
                        $filter->set_language($this->language);
                        $filter->set_filter($item);
                        $page_content = $filter->parse($page_content);
                    }
                    $markdown->set_text($page_content);
                    $page_content =  $markdown->parse();
                }
            } else {
            */
                // debug('file_name', $file_name);
                // $page_content =  $markdown->parse($file_name);
                // debug('page_content', $page_content);
            /*
            }
            */
        }
        // Aoloe\debug('sidebar', $this->sidebar);
        if (isset($this->sidebar)) {
            $sidebar_item = array();
            foreach ($this->sidebar as $key => $value) {
                // Aoloe\debug('key', $key);
                // Aoloe\debug('value', $value);
                switch ($key) {
                    case 'markdown' :
                        if (!is_array($value)) {
                            $value = array($value);
                        }
                        // Aoloe\debug('value', $value);
                        foreach ($value as $item) {
                            // Aoloe\debug('item', $item);
                            $template->clear();
                            $markdown->clear();
                            $markdown->set_text($item);
                            $template->set('text', $markdown->parse());
                            $sidebar_item[] = $template->fetch('template/page_sidebar_text.php');
                        }
                    break;
                    case 'picture' :
                        if (!is_array($value)) {
                            $value = array($value);
                        }
                        foreach ($value as $kkey => $vvalue) {
                            $template->clear();
                            $template->set('image', 'content/page/'.$vvalue);
                            if (is_string($kkey)) {
                                $template->set('alt', $kkey);
                            }
                            $sidebar_item[] = $template->fetch('template/page_sidebar_photo.php');
                        }
                    break;
                }
            }
            // Aoloe\debug('sidebar_item', $sidebar_item);
            $sidebar_content = implode("\n", $sidebar_item);
        }

        // Aoloe\debug('page_content', $page_content);
        $template->clear();
        $template->set('sidebar', $sidebar_content);
        $template->set('content', $page_content);
        $result = $template->fetch('template/page.php');
        // Aoloe\debug('result', $result);
        return $result;
    }
}
