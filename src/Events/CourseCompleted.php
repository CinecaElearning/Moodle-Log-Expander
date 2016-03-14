<?php namespace LogExpander\Events;

class CourseCompleted extends Event {
    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
     public function read(array $opts) {
        return array_merge(parent::read($opts), [
            'user' => $opts['relateduserid'] < 1 ? null : $this->repo->readUser($opts['relateduserid']),
            'relateduser' => $opts['relateduserid'] < 1 ? null : $this->repo->readUser($opts['relateduserid']),
            'course' => $this->repo->readCourse($opts['courseid']),
            'app' => $this->repo->readCourse(1)
        ]);
    }
}