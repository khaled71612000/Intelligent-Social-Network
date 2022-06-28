<?php

use Illuminate\Database\Seeder;

class LearningStyleInsightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("vak_insights")->insert(
            [
                ['id' => 1, 'cover' => 'visual.png', 'content' => json_encode(
                    [
                        ['type' => 'header', 'text' => 'What is Visual Learning Style?'],
                        ['type' => 'paragraph', 'text' => 
                            "Visual Learning is one of the three different learning styles popularized by Neil D. Fleming in his VAK model of learning. The visual learning style means that people need to see information to learn it, and this 'seeing' takes many forms from spatial awareness, photographic memory, color/tone, brightness/contrast, and other visual information. Naturally, a classroom is a very good place for a visual learner to learn. Teachers use overheads, the chalkboard, pictures, graphs, maps, and many other visual items to entice a visual learner into knowledge."
                        ],

                        ['type' => 'image', 'src' => 'visual-icon.jpg'],

                        ['type' => 'header', 'text' => 'Strengths of Visual Learners'],
                        ['type' => 'paragraph', 'text' => 
                            "Visual learners typically do well in a modern classroom setting. After all, there are just so many visuals in classrooms — whiteboards, handouts, photos, and so on. These students have many strengths that can boost their performances in school. Here are just a few of the strengths of this learning type:"
                        ],
                        ['type' => 'list', 'items' => [
                            "Instinctively follows directions",
                            "Easily visualizes objects",
                            "Has a great sense of balance and alignment",
                            "Is an excellent organizer",
                            "Has a strong sense of color, and is very color-oriented",
                            "Can see the passage from a page in a book in his or her mind",
                            "Notices minute similarities and differences between objects and people easily",
                            "Can envision imagery easily",
                        ]],

                        ['type' => 'header', 'text' => 'Visual Learning Strategies'],
                        ['type' => 'paragraph', 'text' => 
                            "If you are a visual learner, you may find these things helpful when sitting in class or studying for a test. Visual learners need things in front of them to help solidify them in their brains, so don't try to go it alone when listening to lectures or studying for your next midterm. Be sure to integrate these tips into your study routine:"
                        ],
                        ['type' => 'list', 'items' => [
                            "Color-code your notes, vocabulary words, and textbook",
                            "Be sure to read the diagrams, maps, and other visuals that go along with text to help you remember it",
                            "Make to-do lists in an agenda",
                            "Study in solitude. You need to see things to remember them and often, any noise will distract you.",
                            "Take notes during lectures to capitalize on your learning style",
                            "Sit near the front so you're better able to see everything",
                            "Use outlines and concept maps to organize your notes",
                        ]],

                        ['type' => 'header', 'text' => 'Visual Learning Strategies'],
                        ['type' => 'paragraph', 'text' => 
                            "Students with the visual learning style make up about 65 percent of your class. These students are the ones traditional classrooms are designed to teach. They will pay attention to your overhead slides, whiteboard, Smartboard, PowerPoint presentations, handouts, graphs, and charts. They will usually take good notes and will appear to be paying attention during class. If you use a lot of verbal directions without visual cues, visual learners may get confused, as they prefer to have something in writing to refer to."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Try these strategies for reaching those students with the visual learning type:"
                        ],
                        ['type' => 'list', 'items' => [
                            "Supplement verbal lectures with a handout, diagram, or other visuals",
                            "Incorporate color into your presentations, the classroom, and handouts",
                            "Give written instructions and expectations",
                            "Vary your reading in class with solitary reading time so visual learners will take in the information better.",
                            "Vary your instructional methods (lectures, group work, solitary work, pairs, circles) and assignments so every learner is challenged",
                            "Show your students how to complete a task instead of just telling your students how to complete a task.",
                            "Show students how to make great vocabulary flashcards",
                            "Use video and still images to enhance your presentations",
                            "Provide written feedback on assignments",
                        ]],
                        
                    ]
                )
                ],

                ['id' => 2, 'cover' => 'auditory.png', 'content' => json_encode(
                    [
                        ['type' => 'header', 'text' => 'What is Auditory Learning Style?'],
                        ['type' => 'paragraph', 'text' => 
                            "Auditory learning is one of the three learning styles established by the VAK model of learning. In essence, auditory learners retain information best when it is presented through sound and speech."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Auditory learners generally remember what their teacher says and readily participate in class. They are good listeners and often very social, which means they can sometimes get distracted from the lesson by everything else going on in the classroom. Auditory learning methods range from studying with voice recordings to memorizing vocabulary words by inventing short songs."
                        ],

                        ['type' => 'image', 'src' => 'auditory-icon.jpg'],

                        ['type' => 'header', 'text' => 'Strengths of Auditory Learners'],
                        ['type' => 'paragraph', 'text' => 
                            "From kindergarten to calculus class, auditory learners will be some of the most engaged and responsive members of any classroom. Here are some of the strengths that will help them achieve success in the classroom:"
                        ],
                        ['type' => 'list', 'items' => [
                            "Good at explaining ideas out loud",
                            "Knack for understanding changes in tone of voice",
                            "Skilled at oral reports and class presentations",
                            "Unafraid to speak up in class",
                            "Follows verbal directions well",
                            "Effective member of study groups",
                            "Gifted storyteller",
                            "Able to work through complex problems by talking out loud",
                        ]],


                        ['type' => 'header', 'text' => 'Auditory Learning Strategies'],
                        ['type' => 'paragraph', 'text' => 
                            "Those with an auditory learning style like to speak and hear others speak in order to learn, but they may have trouble reading silently or staying engaged in a completely quiet classroom. If you are an auditory learner, try these strategies to improve your learning experience."
                        ],

                        ['type' => 'subheader', 'text' => 'Find a study buddy'],
                        ['type' => 'paragraph', 'text' => 
                            "Team up with a study group or a reliable study partner and quiz each other on the content. Verbally reinforcing the information will help you retain it, especially if you have to memorize lots of details."
                        ],

                        ['type' => 'subheader', 'text' => 'Record class lectures'],
                        ['type' => 'paragraph', 'text' => 
                            "Ask your instructor's permission to create audio recordings of class lectures. During class, focus your brain power on listening closely to the lecture. You'll process the information much better this way than if you try to jot down every word the teacher says. Later, you can listen back to the recording and take notes on the most important information."
                        ],

                        ['type' => 'subheader', 'text' => 'Sit near the front of the room'],
                        ['type' => 'paragraph', 'text' => 
                            "Find a spot in the front row so that you can hear every word of the lecture."
                        ],

                        ['type' => 'subheader', 'text' => 'Listen to classical musi'],
                        ['type' => 'paragraph', 'text' => 
                            "Listen to lyric-free music while you study. (Music with lyrics may be too distracting.)"
                        ],

                        ['type' => 'subheader', 'text' => 'Participate in class discussions'],
                        ['type' => 'paragraph', 'text' => 
                            "as much as possible. Talking about your ideas and voicing your questions will increase your understanding of the material. Encourage other students when they speak so that others feel just as comfortable as you do speaking in front of a group. "
                        ],

                        ['type' => 'subheader', 'text' => 'Record yourself reading key terms and their definitions out loud'],
                        ['type' => 'paragraph', 'text' => 
                            "Then, listen to the recording while you walk to class, exercise, or get ready for bed."
                        ],

                        ['type' => 'subheader', 'text' => 'Repeat facts with your eyes closed'],
                        ['type' => 'paragraph', 'text' => 
                            "This technique will help you focus your attention on the auditory process, rather than any other visual stimuli that might be in front of you."
                        ],

                        ['type' => 'subheader', 'text' => 'Read assignments out loud'],
                        ['type' => 'paragraph', 'text' => 
                            "If you're given a homework assignment that involves reading a lengthy chapter, don't feel like you're trapped into a silent reading session. Instead, curl up in your room or another study space and read aloud to yourself. (You can even make it interesting by using goofy voices.)"
                        ],



                        ['type' => 'subheader', 'text' => 'Auditory Learning Tips'],
                        ['type' => 'paragraph', 'text' => 
                            "Auditory learners need to listen, speak, and interact in order to learn. They are often social butterflies. Help the auditory learners in your class put their gift of gab to good use with these teaching strategies."
                        ],
                        ['type' => 'list', 'items' => [
                            "Call on auditory learners to answer questions.",
                            "Lead class discussions and reward class participation.",
                            "During lectures, ask auditory learners to repeat ideas in their own words.",
                            "Record your lectures so that auditory learners can listen to them more than once.",
                            "Allow any struggling auditory learner to take an oral exam instead of a written one.",
                            "Create lesson plans that include a social element, such as paired readings, group work, experiments, projects, and performances.",
                            "Modulate your vocal tone, inflection, and body language during lectures.",
                            "Allow students with an auditory learning style to listen to approved music during silent study periods.",
                        ]],
                        
                        // ['type' => 'image', 'src' => 'Image1.png'],
                        
                        
                    ]
                )
                ],

                ['id' => 3, 'cover' => 'kinesthetic.png', 'content' => json_encode(
                    [
                        
                        ['type' => 'header', 'text' => 'What is Kinesthetic Learning Style?'],
                        ['type' => 'paragraph', 'text' => 
                            "Kinesthetic learning is one of the three different learning styles popularized by Neil D. Fleming in his VAK model of learning. In essence, kinesthetic learners process information best when they are physically engaged during the learning process."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Often, those with a kinesthetic learning style have a hard time learning through traditional lecture-based schooling, because the body does not make the connection that they are doing something when they're listening without movement. Their brains are engaged, but their bodies are not, which makes it more difficult for them to process the information. Much of the time, they need to get up and move to put something into memory."
                        ],

                        ['type' => 'image', 'src' => 'kinesthetic-icon.jpg'],

                        ['type' => 'header', 'text' => 'Strengths of Kinesthetic Learners'],
                        ['type' => 'paragraph', 'text' => 
                            "Kinesthetic learners have many strengths that will help them achieve success in the classroom:"
                        ],
                        ['type' => 'list', 'items' => [
                            "Great hand-eye coordination",
                            "Quick reactions",
                            "Excellent motor memory (can duplicate something after doing it once)",
                            "Excellent experimenters",
                            "Good at sports",
                            "Perform well in art and drama",
                            "High levels of energy",
                        ]],

                        ['type' => 'header', 'text' => 'Kinesthetic Learning Strategies'],
                        ['type' => 'paragraph', 'text' => 
                            "If you're a kinesthetic learner, try these techniques to improve your comprehension, retention, and concentration while studying:"
                        ],

                        ['type' => 'subheader', 'text' => 'Stand Up Instead of Sitting Down'],
                        ['type' => 'paragraph', 'text' => 
                            "You already know that sitting for extended periods of time is bad for your health. But did you know that, as a kinesthetic learner, standing up will improve your comprehension and retention? When you stand up, your body is more engaged and connected to the learning process. Investing in a book stand or standing desk may help you concentrate for longer periods of time and remember more of what you read."
                        ],

                        ['type' => 'subheader', 'text' => 'Combine Your Study Session With Exercise'],
                        ['type' => 'paragraph', 'text' => 
                            "Instead of plopping on the sofa with your notes, get up and do burpees or jumping jacks in between chapters. Ask a friend or family members to quiz you on your study guide while you shoot hoops or jump rope. Combining activity keeps you energized and cements the ideas you're studying in your brain. Plus, as a kinesthetic learner, you need a physical outlet for your excess energy, even when you have to study."
                        ],

                        ['type' => 'subheader', 'text' => 'Utilize Small Movements'],
                        ['type' => 'paragraph', 'text' => 
                            "It's not always possible to stand up and and do high knees during a study session, but you can still use kinesthetic study strategies to keep yourself engaged. Bounce a tennis ball against the floor and catch it every time you answer a question.Twist a rubber band around your wrist or a pencil while you read. Even if the motions are small, they'll help you stay focused and attentive."
                        ],

                        ['type' => 'subheader', 'text' => 'Use a Pen. Use a Pencil. Use a Highlighter'],
                        ['type' => 'paragraph', 'text' => 
                            "Underline important vocabulary or concepts while you read. Highlight and color code passages that connect to one another. Use a pencil to draw flow charts in your books that help break down the passage into small pieces. Add sticky notes that show main ideas and your own inferences. Using effective reading strategies combined with movement makes studying easier for kinesthetic"
                        ],

                        ['type' => 'subheader', 'text' => 'Try Tension and Relaxation'],
                        ['type' => 'paragraph', 'text' => 
                            "When you're in a study situation that truly limits your ability to move, use this tension and relaxation technique to stay focused. In intervals of five to ten seconds, tighten a particular muscle. Then relax when the seconds have passed. This technique helps to release unwanted tension, which is something kinesthetic learners often experience during idle times."
                        ],

                        ['type' => 'subheader', 'text' => 'Get Creative'],
                        ['type' => 'paragraph', 'text' => 
                            "If a topic has become difficult for you, approach it from another angle. Use materials you can manipulate, like blocks or figurines, to visualize a battle scene or explore mathematical concepts. Draw pictures about the topic you're learning or design a video or storyboard explaining the ideas to someone new. You have excellent motor memory; you're likely to better remember something you built than something you read."
                        ],



                        
                        ['type' => 'header', 'text' => 'Kinesthetic Learning Tips'],
                        ['type' => 'paragraph', 'text' => 
                            "Kinesthetic learners need to move their bodies in order to learn. These students are often called 'fidgety', and some teachers might interpret their behavior as distracted or bored. However, a kinesthetic learner's movement does not imply a lack of attention—in fact, it means that they're trying to process information in the most effective possible way. Try these strategies for reaching kinesthetic learners in your classroom:"
                        ],
                        ['type' => 'list', 'items' => [
                            "Allow kinesthetic learners to stand, bounce their legs, or doodle during lectures. You will get more out of them in class if they can move around a little bit.",
                            "Offer various methods of instruction—lectures, paired readings, group work, experiments, projects, plays, etc.",
                            "Ask your kinesthetic learners to complete relevant tasks during the lecture, like filling out a worksheet or taking notes.",
                            "Allow kinesthetic learners to perform movement tasks before and after lectures, like handing out quizzes, writing on the chalkboard, or even rearranging desks.",
                            "If you feel the kinesthetic learners slipping away from you in class, pause the lecture and have the whole class do something energetic: marching, stretching, or switching desks.",
                            "Keep your lectures short and sweet! Plan several different activities throughout each class period in order to be mindful of all your students' learning styles."
                        ]],
                    ]
                )
                ],
            ]
        );
    }
}
