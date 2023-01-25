<?php

if (isset($_COOKIE['success'])) {
  echo  '<div class="alert alert-success alert-dismissible">'.$_COOKIE['success']. ' <button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button></div>' ;
}
if (isset($_COOKIE['error'])) {
    echo  '<div class="alert alert-danger alert-dismissible">'.$_COOKIE['error']. '<button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button></div>' ;
  }
  if (isset($_COOKIE['info'])) {
    echo  '<div class="alert alert-info alert-dismissible">'.$_COOKIE['info']. '<button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button></div>' ;
  }

?>