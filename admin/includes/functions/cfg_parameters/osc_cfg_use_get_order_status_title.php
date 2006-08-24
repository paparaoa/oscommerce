<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2006 osCommerce

  Released under the GNU General Public License
*/

  function osc_cfg_use_get_order_status_title($id) {
    global $osC_Database, $osC_Language;

    if ($id < 1) {
      return TEXT_DEFAULT;
    }

    $Qstatus = $osC_Database->query('select orders_status_name from :table_orders_status where orders_status_id = :orders_status_id and language_id = :language_id');
    $Qstatus->bindTable(':table_orders_status', TABLE_ORDERS_STATUS);
    $Qstatus->bindInt(':orders_status_id', $id);
    $Qstatus->bindInt(':language_id', $osC_Language->getID());
    $Qstatus->execute();

    return $Qstatus->value('orders_status_name');
  }
?>