<?php

/**
 *
 * @author jalf
 */
interface table {
  public function getAll();
  public function findById($id);
  public function insert();
  public function update($id);
  public function delete($id);
}
