<?php

namespace App;

class Main{

	public function publicPing() {
        return array(
            "status" => "ok",
            "message" => "Hello from a public endpoint! You don't need to be authenticated to see this."
        );
    }
}

?>