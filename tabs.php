<?php
	if($current == 'configuration'){
    		if( trim($tab) == trim($view)) {
    			$links[] = "<a class='nav-tab nav-tab-active' href='?page=$current&view=$tab'>$name</a>";
    		} else {
    			$links[] = "<a class='nav-tab' href='?page=$current&view=$tab'>$name</a>";
    		}
    	}