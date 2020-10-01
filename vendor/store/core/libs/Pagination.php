<?php

namespace store\libs;

class Pagination {

    public $currentPage;
    public $perPage;
    public $total;
    public $countPages;
    public $uri;

    public function __construct($page, $perPage, $total) {
        $this->perPage = $perPage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri =$this->getParams();
    }

    public function getCountPages() {
        return ceil($this->total / $this->perPage) ?: 1;
    }

    public function getCurrentPage($page) {
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    public function getStart() {
        return ($this->currentPage -1) * $this->perPage;
    }

    public function getParams() {
        $url = $_SERVER['REQUEST_URI'];

        preg_match_all("#filter=[\d,&]#", $url, $matches);
        if (count($matches[0])  > 1) {
            $url = preg_replace("#filter=[\d,&]+#", "", $url, 1);
        }

        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if (isset($url[1]) && $url[1] != '') {
            $params = explode('&' , $url[1]);
            foreach ($params as $param) {
                if (!preg_match("#page=#", $param)) {
                    $uri .= "{$param}&amp";
                }
            }
        }
        return urldecode($uri);
    }

    public function getHtml() {
        $back = null;
        $forward = null;

        if ($this->currentPage > 1) {
            $back = "<li>
                <a class='page-link' href='{$this->uri}page=" . ($this->currentPage - 1) . "'>Previous</a></li>";
        }
        if ($this->currentPage < $this->countPages) {
            $forward = "<li>
                <a class='page-link' href='{$this->uri}page=" . ($this->currentPage + 1) . "'>Next</a></li>";
        }

        return '<ul class="pagination">' . $back . $forward . '</ul>';
    }

    public function __toString() {
        return $this->getHtml();
    }
}