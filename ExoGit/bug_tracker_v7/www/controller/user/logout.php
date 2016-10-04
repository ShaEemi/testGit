<?php

	if (isset($_SESSION['user'])) {
		
		session_unset();

		header('Location: ?module=user&action=login&logout=ok');

	} else {

		header('Location: ?module=bug_tracker&action=index&logout=nok');
	}