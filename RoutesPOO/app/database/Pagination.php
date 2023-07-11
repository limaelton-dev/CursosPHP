<?php
namespace app\database;

class Pagination 
{
    private int $currentPage = 1;
    private int $totalPages;
    private int $linksPerPage = 5;
    private int $itemsPerPage = 10;
    private int $totalItems;
    private string $pageIdentifier = 'page';


    function setTotalItems(int $totalItems) 
    {
        $this->totalItems = $totalItems;
    }

    function setPageIdentifier(string $identifier)  
    {
        $this->identifier = $identifier;    
    }

    function setItemsPerPage(int $itemsPerPage) 
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    private function calculations()
    {
        $this->currentPage = $_GET['page'] ?? 1;

        $offset = ($this->currentPage - 1) * $this->itemsPerPage;
        $this->totalPages = ceil($this->totalItems / $this->itemsPerPage);

        return "limit {$this->itemsPerPage} offset {$offset}";
    }

    function dump() 
    {
        return $this->calculations();
    }

    function links() 
    {
        $links = "<ul class='pagination'>";

        if($this->currentPage > 1) {
            $previous = $this->currentPage - 1;
            $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $previous]));
            $first = http_build_query(array_merge($_GET, [$this->pageIdentifier => 1]));
            $links .= "<li class='page-item'><a href='?{$linkPage}' class='page-link'>Anterior</a></li>";
            $links .= "<li class='page-item'><a href='?{$first}' class='page-link'>Primeira</a></li>";
        }

        for ($i = $this->currentPage - $this->linksPerPage; $i <= $this->currentPage + $this->linksPerPage ; $i++) { 
            if($i > 0 && $i <= $this->totalPages) {
                $class = $this->currentPage === $i ? 'active' : '';
                $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $i]));
                $links .= "<li class='page-item {$class}'><a href='?{$linkPage}' class='page-link'></a></li>"
            }
        }

        if($this->currentPage < $this->totalPages) {
            $next = $this->currentPage + 1;
            $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $next]));
            $last = http_build_query(array_merge($_GET, [$this->pageIdentifier => $this->totalPages]));
            $links .= "<li class='page-item'><a href='?{$linkPage}' class='page-link'>Próxima</a></li>";
            $links .= "<li class='page-item'><a href='?{$last}' class='page-link'>Última</a></li>";
        }


        $links .= "</ul>";
    }
}