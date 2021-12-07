<?php
class Pagination
{
  private $totalPages;
  private $sizeContent;
  private $pagen;
  public function __construct()
  {
  }

  function setTotalPages($totalPages)
  {
    $this->totalPages = $totalPages;
  }
  public function getTotalPages()
  {
    return $this->totalPages;
  }
}
