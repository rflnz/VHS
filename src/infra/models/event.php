<?php

namespace Src\Infra\Models;

require_once __DIR__ . '/../../application/core/model.php';

use DateTime;
use Src\Application\Core\Model;

class EventModel extends Model {
    public function create(int $user_id, string $title, string $description, string $thumbnail_url, DateTime $planned_events) : bool {
        $sql = <<<SQL
            INSERT INTO events (user_id, title, description, thumbnail, planned_events)
            VALUES (:user_id, :title, :description, :thumbnail, :planned_events)
        SQL;
        
        $stmt = $this->database->exec($sql, [
            ":user_id" => $user_id,
            ":title" => $title,
            ":description" => $description,
            ":thumbnail" => $thumbnail_url,
            ":planned_events" => $planned_events 
        ]);
        
        return $stmt;
    }

    public function getAllEvents() : array {
        $sql = <<<SQL
            SELECT 
                events.id, 
                users.id AS user_id,
                users.name, 
                events.title, 
                events.description, 
                events.planned_events, 
                events.thumbnail_url
            FROM events 
            INNER JOIN users ON events.user_id = users.id
        SQL;
    
        return $this->database->query($sql, []);
    }    
}