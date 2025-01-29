<?php

namespace App\School\Entities;

class Enrollment
{
    protected int $student_id;
    protected int $subject_id;
    protected \DateTime $enrollment_date;

    public function __construct(int $student_id, int $subject_id, \DateTime $enrollment_date)
    {
        $this->student_id = $student_id;
        $this->subject_id = $subject_id;
        $this->enrollment_date = $enrollment_date;
    }

    public function getStudentId(): int
    {
        return $this->student_id;
    }

    public function getSubjectId(): int
    {
        return $this->subject_id;
    }

    public function getEnrollmentDate(): \DateTime
    {
        return $this->enrollment_date;
    }
}
