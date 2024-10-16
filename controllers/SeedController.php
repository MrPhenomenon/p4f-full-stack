<?php

namespace console\controllers;

use yii\console\Controller;
use app\models\Vendor;
use app\models\User;
use app\models\Exam;
use app\models\Cart;

class SeedController extends Controller
{
    public function actionIndex()
    {
        $this->seedVendors();
        $this->seedUsers();
        $this->seedExams();
        $this->seedCarts();
    }

    protected function seedVendors()
    {
        $vendors = [
            ['name' => 'Alibaba', 'total_exams' => 10, 'total_certifications' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'price' => 200.00],
            ['name' => 'Red Hat', 'total_exams' => 7, 'total_certifications' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'price' => 200.00],
            ['name' => 'Snowflake', 'total_exams' => 2, 'total_certifications' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'price' => 200.00],
            ['name' => 'PostgreSQL', 'total_exams' => 1, 'total_certifications' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'price' => 200.00],
            ['name' => 'Informatica', 'total_exams' => 3, 'total_certifications' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'price' => 200.00],
            ['name' => 'Amazon', 'total_exams' => 12, 'total_certifications' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'price' => 200.00],
            ['name' => 'eBay', 'total_exams' => 7, 'total_certifications' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'price' => 200.00],
            ['name' => 'Etsy', 'total_exams' => 5, 'total_certifications' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'price' => 200.00],
        ];

        foreach ($vendors as $vendorData) {
            $vendor = new Vendor();
            $vendor->setAttributes($vendorData);
            if ($vendor->save()) {
                echo "Vendor '{$vendor->name}' seeded successfully.\n";
            } else {
                echo "Failed to seed vendor '{$vendor->name}': " . json_encode($vendor->getErrors()) . "\n";
            }
        }
    }

    protected function seedUsers()
    {
        $users = [
            ['username' => 'admin', 'password' => password_hash('yourpassword', PASSWORD_BCRYPT), 'email' => 'admin@admin.com', 'token' => null, 'status' => 1],
            ['username' => 'Abdullah', 'password' => password_hash('yourpassword', PASSWORD_BCRYPT), 'email' => 'test1@gmail.com', 'token' => null, 'status' => 1],
        ];

        foreach ($users as $userData) {
            $user = new User();
            $user->setAttributes($userData);
            if ($user->save()) {
                echo "User '{$user->username}' seeded successfully.\n";
            } else {
                echo "Failed to seed user '{$user->username}': " . json_encode($user->getErrors()) . "\n";
            }
        }
    }

    protected function seedExams()
    {
        $exams = [
            ['vendor_id' => 1, 'name' => 'Exam 101', 'description' => 'Description for Exam 101', 'registration_code' => 'MMZMKRD573', 'number_of_questions' => 50, 'updated_on' => date('Y-m-d')],
            ['vendor_id' => 1, 'name' => 'Exam 102', 'description' => 'Description for Exam 102', 'registration_code' => 'NUNDFQO859', 'number_of_questions' => 60, 'updated_on' => date('Y-m-d')],
            ['vendor_id' => 2, 'name' => 'Exam 201', 'description' => 'Description for Exam 201', 'registration_code' => 'QOVNEGU131', 'number_of_questions' => 45, 'updated_on' => date('Y-m-d')],
            ['vendor_id' => 2, 'name' => 'Exam 202', 'description' => 'Description for Exam 202', 'registration_code' => 'IEXZGJY673', 'number_of_questions' => 55, 'updated_on' => date('Y-m-d')],
            ['vendor_id' => 3, 'name' => 'Exam 301', 'description' => 'Description for Exam 301', 'registration_code' => 'NRRMIDT335', 'number_of_questions' => 40, 'updated_on' => date('Y-m-d')],
        ];

        foreach ($exams as $examData) {
            $exam = new Exam();
            $exam->setAttributes($examData);
            if ($exam->save()) {
                echo "Exam '{$exam->name}' seeded successfully.\n";
            } else {
                echo "Failed to seed exam '{$exam->name}': " . json_encode($exam->getErrors()) . "\n";
            }
        }
    }

    protected function seedCarts()
    {
        $carts = [
            ['user_id' => 38, 'vendor_id' => 1, 'created_At' => date('Y-m-d H:i:s')],
            ['user_id' => 39, 'vendor_id' => 2, 'created_At' => date('Y-m-d H:i:s')],
            ['user_id' => 38, 'vendor_id' => 3, 'created_At' => date('Y-m-d H:i:s')],
            ['user_id' => 38, 'vendor_id' => 1, 'created_At' => date('Y-m-d H:i:s')],
            ['user_id' => 39, 'vendor_id' => 2, 'created_At' => date('Y-m-d H:i:s')],
            ['user_id' => 38, 'vendor_id' => 3, 'created_At' => date('Y-m-d H:i:s')],
            ['user_id' => 38, 'vendor_id' => 1, 'created_At' => date('Y-m-d H:i:s')],
            ['user_id' => 39, 'vendor_id' => 2, 'created_At' => date('Y-m-d H:i:s')],
            ['user_id' => 38, 'vendor_id' => 3, 'created_At' => date('Y-m-d H:i:s')],
        ];

        foreach ($carts as $cartData) {
            $cart = new Cart();
            $cart->setAttributes($cartData);
            if ($cart->save()) {
                echo "Cart for user ID '{$cart->user_id}' seeded successfully.\n";
            } else {
                echo "Failed to seed cart for user ID '{$cart->user_id}': " . json_encode($cart->getErrors()) . "\n";
            }
        }
    }
}
