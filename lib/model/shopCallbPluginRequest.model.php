<?php

/*
 * Class shopCallbPluginRequestModel
 * @author Max Severin <makc.severin@gmail.com>
 */

class shopCallbPluginRequestModel extends waModel {

	protected $table = 'shop_callb_request';

	public function countAll($show_deleted = 'off') {
		if ($show_deleted === 'off') {
			return $this->query("SELECT COUNT(*) FROM ".$this->table." WHERE `status` != 'del'")->fetchField();
		} else {
			return parent::countAll();
		}
	}

	public function getCallbRequests($offset = 0, $limit = null, $show_deleted = 'off') {
		$sql = '';

		$sql .= "SELECT * FROM `{$this->table}`";
		if ($show_deleted === 'off'){
			$sql .= " WHERE `status` != 'del'";
		}
		$sql .= " ORDER BY `create_datetime` DESC";
		$sql .= " LIMIT ".($offset ? $offset.',' : '').(int)$limit;

		$callb_requests = $this->query($sql)->fetchAll('id');

		foreach ($callb_requests as $id => $request) {

			$callb_requests[$id]['human_status'] = '';
			$callb_requests[$id]['contact_name'] = '';
			$callb_requests[$id]['contact_email'] = '';

			switch ($request['status']) {
				case 'new':
					$callb_requests[$id]['human_status'] = 'новый';
					break;
				case 'del':
					$callb_requests[$id]['human_status'] = 'выполнен';
					break;
				
				default:
					$callb_requests[$id]['human_status'] = 'без статуса';
					break;
			}

			$contact = new waContact($request['contact_id']);

			$callb_requests[$id]['contact_name'] = $contact->getName();
			$callb_requests[$id]['contact_email'] = $contact->get('email', 'default');

		}

		return $callb_requests;
	}

}