<?php

class TestCommand extends CConsoleCommand {
    public function run($args) {
        echo "this a test command executing";
    }
}