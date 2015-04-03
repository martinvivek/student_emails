<?php


class course {
    public
        /** Basic info
         * @var $id int Course id in database
         * @var $name string Long course name in database
         */
        $id, $name,

        /** Rankings
         * Can be positive (most) or negative (least) depending on
         * @var
         */
        $social_rank, $studious_rank,

        // Course Completion
        $course_time_completed, $course_material_completed,

        // ?/? people read student's posts
        $total_student_count, $average_post_readers,

        // login info
        $login_frequency_days, $last_login;
}