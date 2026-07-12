<?php
namespace Database\Seeders;

use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;

class QuizQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [

            // ─── SCIENCE ───────────────────────────────────────
            ['subject'=>'Science','question'=>'What is the chemical symbol for Gold?','option_a'=>'Go','option_b'=>'Gd','option_c'=>'Au','option_d'=>'Ag','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Science','question'=>'How many planets are in our Solar System?','option_a'=>'7','option_b'=>'8','option_c'=>'9','option_d'=>'10','correct_answer'=>'b','difficulty'=>'easy'],
            ['subject'=>'Science','question'=>'What gas do plants absorb from the atmosphere?','option_a'=>'Oxygen','option_b'=>'Nitrogen','option_c'=>'Carbon Dioxide','option_d'=>'Hydrogen','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Science','question'=>'What is the speed of light approximately?','option_a'=>'150,000 km/s','option_b'=>'200,000 km/s','option_c'=>'300,000 km/s','option_d'=>'400,000 km/s','correct_answer'=>'c','difficulty'=>'medium'],
            ['subject'=>'Science','question'=>'What is the powerhouse of the cell?','option_a'=>'Nucleus','option_b'=>'Ribosome','option_c'=>'Mitochondria','option_d'=>'Chloroplast','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Science','question'=>'What is the atomic number of Carbon?','option_a'=>'4','option_b'=>'6','option_c'=>'8','option_d'=>'12','correct_answer'=>'b','difficulty'=>'medium'],
            ['subject'=>'Science','question'=>'Which planet is known as the Red Planet?','option_a'=>'Venus','option_b'=>'Jupiter','option_c'=>'Mars','option_d'=>'Saturn','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Science','question'=>'What is H2O commonly known as?','option_a'=>'Salt','option_b'=>'Sugar','option_c'=>'Water','option_d'=>'Acid','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Science','question'=>'DNA stands for?','option_a'=>'Deoxyribonucleic Acid','option_b'=>'Diribonucleic Acid','option_c'=>'Deoxyribonitric Acid','option_d'=>'None','correct_answer'=>'a','difficulty'=>'medium'],
            ['subject'=>'Science','question'=>'Which force keeps planets in orbit around the Sun?','option_a'=>'Magnetic force','option_b'=>'Nuclear force','option_c'=>'Gravity','option_d'=>'Friction','correct_answer'=>'c','difficulty'=>'easy'],

            // ─── HISTORY ───────────────────────────────────────
            ['subject'=>'History','question'=>'In which year did World War II end?','option_a'=>'1943','option_b'=>'1944','option_c'=>'1945','option_d'=>'1946','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'History','question'=>'Who was the first President of the United States?','option_a'=>'Abraham Lincoln','option_b'=>'George Washington','option_c'=>'Thomas Jefferson','option_d'=>'John Adams','correct_answer'=>'b','difficulty'=>'easy'],
            ['subject'=>'History','question'=>'The Great Wall of China was built primarily to protect against whom?','option_a'=>'Romans','option_b'=>'Mongols','option_c'=>'Japanese','option_d'=>'Persians','correct_answer'=>'b','difficulty'=>'medium'],
            ['subject'=>'History','question'=>'Who discovered America in 1492?','option_a'=>'Vasco da Gama','option_b'=>'Ferdinand Magellan','option_c'=>'Christopher Columbus','option_d'=>'Amerigo Vespucci','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'History','question'=>'Which empire was ruled by Julius Caesar?','option_a'=>'Greek','option_b'=>'Ottoman','option_c'=>'Roman','option_d'=>'Byzantine','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'History','question'=>'In which year did the French Revolution begin?','option_a'=>'1776','option_b'=>'1789','option_c'=>'1799','option_d'=>'1804','correct_answer'=>'b','difficulty'=>'medium'],
            ['subject'=>'History','question'=>'Who painted the Mona Lisa?','option_a'=>'Michelangelo','option_b'=>'Raphael','option_c'=>'Leonardo da Vinci','option_d'=>'Donatello','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'History','question'=>'The Titanic sank in which year?','option_a'=>'1910','option_b'=>'1911','option_c'=>'1912','option_d'=>'1913','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'History','question'=>'Which country gifted the Statue of Liberty to the USA?','option_a'=>'England','option_b'=>'Germany','option_c'=>'France','option_d'=>'Spain','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'History','question'=>'Who was the first man to walk on the Moon?','option_a'=>'Buzz Aldrin','option_b'=>'Yuri Gagarin','option_c'=>'Neil Armstrong','option_d'=>'John Glenn','correct_answer'=>'c','difficulty'=>'easy'],

            // ─── SPORTS ────────────────────────────────────────
            ['subject'=>'Sports','question'=>'How many players are on a football (soccer) team?','option_a'=>'9','option_b'=>'10','option_c'=>'11','option_d'=>'12','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Sports','question'=>'In which sport is the term "Love" used for zero?','option_a'=>'Badminton','option_b'=>'Tennis','option_c'=>'Cricket','option_d'=>'Golf','correct_answer'=>'b','difficulty'=>'easy'],
            ['subject'=>'Sports','question'=>'How many rings are on the Olympic flag?','option_a'=>'4','option_b'=>'5','option_c'=>'6','option_d'=>'7','correct_answer'=>'b','difficulty'=>'easy'],
            ['subject'=>'Sports','question'=>'Which country invented cricket?','option_a'=>'Australia','option_b'=>'India','option_c'=>'England','option_d'=>'South Africa','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Sports','question'=>'How many points is a touchdown worth in American Football?','option_a'=>'3','option_b'=>'4','option_c'=>'6','option_d'=>'7','correct_answer'=>'c','difficulty'=>'medium'],
            ['subject'=>'Sports','question'=>'Which country has won the most FIFA World Cups?','option_a'=>'Germany','option_b'=>'Argentina','option_c'=>'Italy','option_d'=>'Brazil','correct_answer'=>'d','difficulty'=>'medium'],
            ['subject'=>'Sports','question'=>'How long is a marathon race in kilometers?','option_a'=>'40 km','option_b'=>'42.195 km','option_c'=>'45 km','option_d'=>'38 km','correct_answer'=>'b','difficulty'=>'medium'],
            ['subject'=>'Sports','question'=>'In basketball, how many points is a free throw worth?','option_a'=>'1','option_b'=>'2','option_c'=>'3','option_d'=>'0','correct_answer'=>'a','difficulty'=>'easy'],
            ['subject'=>'Sports','question'=>'Which sport uses a shuttlecock?','option_a'=>'Tennis','option_b'=>'Squash','option_c'=>'Badminton','option_d'=>'Pickleball','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Sports','question'=>'How many holes are in a standard round of golf?','option_a'=>'9','option_b'=>'12','option_c'=>'18','option_d'=>'21','correct_answer'=>'c','difficulty'=>'easy'],

            // ─── TECHNOLOGY ────────────────────────────────────
            ['subject'=>'Technology','question'=>'What does CPU stand for?','option_a'=>'Central Processing Unit','option_b'=>'Computer Processing Unit','option_c'=>'Central Program Utility','option_d'=>'Core Processing Unit','correct_answer'=>'a','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'Who founded Microsoft?','option_a'=>'Steve Jobs','option_b'=>'Elon Musk','option_c'=>'Bill Gates','option_d'=>'Mark Zuckerberg','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'What does HTML stand for?','option_a'=>'Hyper Text Markup Language','option_b'=>'High Text Machine Language','option_c'=>'Hyper Transfer Markup Language','option_d'=>'None','correct_answer'=>'a','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'Which company created the iPhone?','option_a'=>'Samsung','option_b'=>'Google','option_c'=>'Apple','option_d'=>'Sony','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'What does "www" stand for in a website?','option_a'=>'World Wide Web','option_b'=>'Wide World Web','option_c'=>'World Web Wide','option_d'=>'Web World Wide','correct_answer'=>'a','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'Which programming language is known as the language of the web?','option_a'=>'Python','option_b'=>'Java','option_c'=>'JavaScript','option_d'=>'C++','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'What does RAM stand for?','option_a'=>'Read Access Memory','option_b'=>'Random Access Memory','option_c'=>'Rapid Access Memory','option_d'=>'Random Application Memory','correct_answer'=>'b','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'Who is the founder of Tesla?','option_a'=>'Bill Gates','option_b'=>'Jeff Bezos','option_c'=>'Elon Musk','option_d'=>'Larry Page','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'What is the most used search engine in the world?','option_a'=>'Bing','option_b'=>'Yahoo','option_c'=>'DuckDuckGo','option_d'=>'Google','correct_answer'=>'d','difficulty'=>'easy'],
            ['subject'=>'Technology','question'=>'In what year was the first iPhone released?','option_a'=>'2005','option_b'=>'2006','option_c'=>'2007','option_d'=>'2008','correct_answer'=>'c','difficulty'=>'medium'],

            // ─── GEOGRAPHY ─────────────────────────────────────
            ['subject'=>'Geography','question'=>'What is the capital of Australia?','option_a'=>'Sydney','option_b'=>'Melbourne','option_c'=>'Brisbane','option_d'=>'Canberra','correct_answer'=>'d','difficulty'=>'medium'],
            ['subject'=>'Geography','question'=>'Which is the largest ocean?','option_a'=>'Atlantic','option_b'=>'Indian','option_c'=>'Pacific','option_d'=>'Arctic','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Geography','question'=>'Which country has the most natural lakes?','option_a'=>'USA','option_b'=>'Russia','option_c'=>'Canada','option_d'=>'Brazil','correct_answer'=>'c','difficulty'=>'hard'],
            ['subject'=>'Geography','question'=>'What is the longest river in the world?','option_a'=>'Amazon','option_b'=>'Yangtze','option_c'=>'Mississippi','option_d'=>'Nile','correct_answer'=>'d','difficulty'=>'easy'],
            ['subject'=>'Geography','question'=>'Which continent is the largest by area?','option_a'=>'Africa','option_b'=>'Asia','option_c'=>'North America','option_d'=>'Europe','correct_answer'=>'b','difficulty'=>'easy'],
            ['subject'=>'Geography','question'=>'What is the capital of Japan?','option_a'=>'Osaka','option_b'=>'Kyoto','option_c'=>'Tokyo','option_d'=>'Hiroshima','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Geography','question'=>'Which desert is the largest in the world?','option_a'=>'Sahara','option_b'=>'Gobi','option_c'=>'Arabian','option_d'=>'Antarctic','correct_answer'=>'d','difficulty'=>'hard'],
            ['subject'=>'Geography','question'=>'How many countries are in Africa?','option_a'=>'44','option_b'=>'54','option_c'=>'64','option_d'=>'74','correct_answer'=>'b','difficulty'=>'medium'],
            ['subject'=>'Geography','question'=>'Which country is both a continent and a country?','option_a'=>'Greenland','option_b'=>'Antarctica','option_c'=>'Australia','option_d'=>'Brazil','correct_answer'=>'c','difficulty'=>'easy'],
            ['subject'=>'Geography','question'=>'What is the tallest mountain in the world?','option_a'=>'K2','option_b'=>'Kangchenjunga','option_c'=>'Mount Everest','option_d'=>'Lhotse','correct_answer'=>'c','difficulty'=>'easy'],
        ];

        foreach ($questions as $q) {
            QuizQuestion::create($q);
        }
    }
}