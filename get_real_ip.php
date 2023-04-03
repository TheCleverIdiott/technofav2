<?
function getIP()
{
		// Find the user's IP address. (but don't let it give you 'unknown'!)
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_CLIENT_IP']) && (preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['HTTP_CLIENT_IP']) == 0 || preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['REMOTE_ADDR']) != 0))
		{
			// We have both forwarded for AND client IP... check the first forwarded for as the block - only switch if it's better that way.
			if (strtok($_SERVER['HTTP_X_FORWARDED_FOR'], '.') != strtok($_SERVER['HTTP_CLIENT_IP'], '.') && '.' . strtok($_SERVER['HTTP_X_FORWARDED_FOR'], '.') == strrchr($_SERVER['HTTP_CLIENT_IP'], '.') && (preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['HTTP_X_FORWARDED_FOR']) == 0 || preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['REMOTE_ADDR']) != 0))
				$_SERVER['REMOTE_ADDR'] = implode('.', array_reverse(explode('.', $_SERVER['HTTP_CLIENT_IP'])));
			else
				$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CLIENT_IP'];
		}
		if (!empty($_SERVER['HTTP_CLIENT_IP']) && (preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['HTTP_CLIENT_IP']) == 0 || preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['REMOTE_ADDR']) != 0))
		{
			// Since they are in different blocks, it's probably reversed.
			if (strtok($_SERVER['REMOTE_ADDR'], '.') != strtok($_SERVER['HTTP_CLIENT_IP'], '.'))
				$_SERVER['REMOTE_ADDR'] = implode('.', array_reverse(explode('.', $_SERVER['HTTP_CLIENT_IP'])));
			else
				$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			// If there are commas, get the last one.. probably.
			if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false)
			{
				$ips = array_reverse(explode(', ', $_SERVER['HTTP_X_FORWARDED_FOR']));

				// Go through each IP...
				foreach ($ips as $i => $ip)
				{
					// Make sure it's in a valid range...
					if (preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $ip) != 0 && preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['REMOTE_ADDR']) == 0)
						continue;

					// Otherwise, we've got an IP!
					$_SERVER['REMOTE_ADDR'] = trim($ip);
					break;
				}
			}
			// Otherwise just use the only one.
			elseif (preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['HTTP_X_FORWARDED_FOR']) == 0 || preg_match('~^((0|10|172\.16|192\.168|255|127\.0)\.|unknown)~', $_SERVER['REMOTE_ADDR']) != 0)
				$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		elseif (!isset($_SERVER['REMOTE_ADDR']))
			$_SERVER['REMOTE_ADDR'] = '';
			
		return $_SERVER['REMOTE_ADDR'];
}
?>