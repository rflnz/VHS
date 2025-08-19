<?php

namespace Src\Application\Controllers;

require_once __DIR__ . '/../infra/models/event.php';
require_once __DIR__ . '/../application/core/controller.php';

use Src\Infra\Models\EventModel;
use Src\Application\Core\Controller;

class RegisterEventController extends Controller {
    private EventModel $eventModel;

    public function index() {
        try {
            $this->eventModel = $this->model("event");

            $events = $this->eventModel->getAllEvents();

            echo "<pre>";
            print_r($events);
            echo "</pre>";

            return;

        } catch (\Throwable $exception) {
            print_r($exception->getMessage());
        }
    }
}