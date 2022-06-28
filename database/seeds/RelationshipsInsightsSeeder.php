<?php

use Illuminate\Database\Seeder;

class RelationshipsInsightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("relationship_issues")->insert(
            [
                // INTJ INFJ
                ['personality1_id' => 1, 'personality2_id' => 2, 'cover' => 'infj.png', 'content' => json_encode(
                    [
                        ['type' => 'header', 'text' => 'How INTJ and INFJ Get Along'],
                        ['type' => 'paragraph', 'text' => 
                            "INTJs and INFJs have some common themes that often arise when they get to know each other. As an INTJ, you'll want to keep these issues in mind when you get to know an INFJ."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "As an Intuitive Thinking type, you approach relationships a little differently than the average person. You have a lively mind and an appetite for ideas. More than any other type, you like to spend time with people who can keep up with you mentally and who expose you to new ideas and worldviews. Ultimately, what you are looking for in relationships is intellectual stimulation—although you also appreciate people who can draw out your softer side."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "When relating to your counterpart, bear in mind that as an Intuitive Feeling type, they will tend to be highly idealistic about their relationships. They want authentic connections that reflect their true values, and they want to see who you really are as a person. Intuitive Feelers want to go deep, and revealing yourself to them is a worthwhile endeavor—once they feel they know you, they'll be a tireless cheerleader for your dreams and ambitions."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "When first meeting this person, they may seem to you to have an interesting mind. You may be drawn to their way of seeing things and their unconventional perspectives. However, they may also seem to you to be a bit whimsical. Although they will likely seem intelligent, they may also seem overly emotional or sensitive. They may be a bit wary of you, in turn, as you may seem more blunt and critical than they are entirely comfortable with."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You are logic-driven, whereas your counterpart is values-driven. Although you both like to analyze, your interest lies more with logic and reason—does this make sense? Is it the most efficient, the most even-handed option? On the other hand, your counterpart takes their cues from morality and ethics—how can this work best for people? You may find that although you are drawn into fascinating conversations with this person, those same conversations tend to end in frustration as you simply cannot agree on what's important."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "However, you may benefit from perseverance in this relationship. Your logical, rational nature may at times betray you, leading you to try to apply logic to situations that are ultimately subjective and personal. This person, who at their worst appears capricious and illogical, can help you to tune into your more emotional, caring side and ensure that you don't neglect what makes you human. In particular, they may help you to understand that all decisions cannot be made with the head; sometimes your heart must call the shots."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Conversely, you can help them learn how to balance their decision-making. Although your friend's natural instinct is to do what feels right, you can ask tough questions that help them to consider all aspects of the choice—and make a difficult decision when the situation calls for it. You can also help them learn to advocate for their own needs, and to discover the magic of saying 'no.'"
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Although there are some common problems that can arise in INTJ/INFJ relationships, it's important to remember that there's no such thing as a perfectly compatible pair in personality typing. Whether you get along with someone has more to do with your own self-knowledge and your sensitivity to your friend's needs and preferences—not some magic formula. Learning more about your own type with an in-depth assessment is a great place to start to build the self-awareness that is key to successful relationships."
                        ],



                        ['type' => 'header', 'text' => 'Communication Between INTJ and INFJ'],
                        ['type' => 'paragraph', 'text' => 
                            "Communication can be a challenge between any two people, and communication between INTJ and INFJ personality types is not the exception. By being aware of the issues that often arise when INTJs and INFJs communicate, you can learn how to reach an understanding more quickly."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You and your counterpart share an abstract style of communication. Your conversations will tend to focus on your impressions, ideas, opinions, and theories. You may find yourselves discussing philosophy, the arts, the latest advances in science, or your ideas about how to make the world a better place."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You are likely to find one another interesting and stimulating to talk to. Neither of you is terribly interesting in recounting events in tedious detail or sharing dry facts without any context, and since both of you probably have the experience of getting stuck in such mundane exchanges with other people, talking to one another should be a refreshing break."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Although you share a similar general style of communicating, there is still potential for misunderstandings between the two of you. When working on projects together, you may find that you tend to discuss the overall goals, but neglect to hammer out the details. You are both inclined to talk more about the general idea, and less about the facts and practicalities. When working together to create a plan, make sure you attend to any details that need to be decided, and don't just assume you're on the same page."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "'Still waters run deep' is an apt motto for both of you, and as a result, striking up a conversation may initially be a challenge. But if you can get through the awkward get-to-know you phase, you'll find rich and wonderful opportunities to share thoughts and ideas with each other."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You are both deep, intuitive, and reflective thinkers. You tend to be fascinated with complex ideas and enjoy exploring the meaning of things. Your specific interests may not be the same, but you share a way of thinking about things that is highly complementary. Although it may take you a while to get started, once you're absorbed in conversation with one another, you'll likely both find it fascinating."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Be aware that when communicating with this person, your usual style may come off as overly blunt or even confrontational. Your counterpart pays a lot of attention to the quality of relationships and is constantly monitoring the emotional overtones of any conversation. This means that they are reluctant to say anything controversial or possibly upsetting."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You, on the other hand, have a tendency to call it like it is, without too much concern for how people will react. This can create an imbalance in your dynamic, where your Feeling counterpart is desperately trying to maintain emotional harmony while you relentlessly rock the boat."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You'll be more successful in your communications if you take time to consider the emotional impact of your words. Sure, everyone wants honesty, but most people also like tact. If you're delivering news that may be hard to hear, think about how you can soften the message. And be aware that your ever-so-charming habit of offering unsolicited 'constructive criticism' may not always be taken in the spirit it was intended."
                        ],

                        ['type' => 'header', 'text' => 'INTJ vs. INFJ Values'],
                        ['type' => 'paragraph', 'text' => 
                            "Values are intensely personal, and while an INTJ and an INFJ can find common ground, there will always be some differences in what you hold dear. However, understand how your INTJ approach to values compares with your INFJ counterpart's will help you to appreciate and overcome your differences."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "The two of you share a passion for improvement and a belief that everything can always be made better. You both tend to question rather than simply accept how things are, and you're constantly wondering how innovation and imagination might make for a better way."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "However, though you're both interested in making positive changes, you may differ somewhat in terms of how you define that interest. Your interest tends to focus on innovation in logical realms like technology, business, and the sciences. You're interested in how intelligence and analytical thinking can make the world more advanced, enlightened, prosperous, and efficient. On the other hand, your counterpart takes a more humanistic approach. They are focused on making the world a better place for people—they want to solve world hunger, educate the poor, and bring peace and happiness to all."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Though you'll often find their ideas interesting, they may seem overly idealistic, impractical, or inefficient. And in turn, they may feel your ideas lack a bit of heart. For them, innovative ideas are only compelling when they have the potential to help the human race."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You also have somewhat different values when it comes to relationships. Your partner tends to be intensely interested in people and eager to find out what really matters to them. They are compassionate and emotionally engaged. On the other hand, you tend to be somewhat more detached. You'd often rather engage intellectually than emotionally. You may find your counterpart pushing you to 'get real' and share how you feel about things, while you just want to stick to talking about what you think."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "This person has the potential to help you gain a more well-rounded approach to how you see the world. Because you share a fundamental passion for interesting ideas and positive change, you can connect well on this level. However, your different approach to values creates an opportunity to learn from one another. You can help your friend to to be a bit more hard-headed about their ideas, shoring up their creative idealism with a healthy dose of logic and reason. And your friend can help you open up to the human side of things, and consider the impact of your ideas on the people involved."
                        ],


                        ['type' => 'header', 'text' => 'INTJ and INFJ in Daily Life'],
                        ['type' => 'paragraph', 'text' => 
                            "Lifestyle is an under-appreciated—but extremely important—element of compatibility. Your values and ideals may coincide perfectly, but if you can't agree on how to conduct day-to-day matters, your relationship will always have friction. As an INTJ in a relationship with an INFJ, you can expect certain issues to arise in your daily life. Discussing these in advance, and figuring out how to deal with them, will make things go much more smoothly as you develop your relationship."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "The two of you are likely to share a general intellectual curiosity and interest in learning new things. Both of you tend to appreciate the value of culture, the sciences, and the arts, and while you may not share specific hobbies, you'll probably have interests that you can at least mutually appreciate."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "For both of you, discovering new ideas is a lifelong pursuit. You'll probably share a mutual interest in reading, going to museums and cultural events, taking classes for fun, and other activities that allow you to learn and improve your minds. In fact, you may find that learning new things together is a great way to bring you closer."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You also share a low tolerance for the mundane. You both find day-to-day routine somewhat toxic, and you may find that your lives together involve frequent attempts to 'shake things up.' You may dream of traveling around the world together or quitting your jobs to start a new business. This mutual taste for adventure is stimulating for both of you, and helps keep things exciting between you. However, during the inevitable dull periods of your life together, it's likely that you'll both be a bit cranky. Bear in mind that keeping things novel and fresh is key to both of your happiness."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You take a similarly orderly approach to life and share an appreciation for schedules, to-do lists, and organizational systems. If you share space, it’s likely to be well organized and tidy. While you may sometimes disagree on exactly how to organize something, you both appreciate the process of creating structure, and will typically enjoy working together to get systems in place. "
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You both get overstimulated by too much activity and both enjoy spending quiet time alone. You and your partner might often find yourself at home with takeout and Netflix, or even in the same room without actually talking to each other, and you’re both okay with that. You likely both have small but intimate circles of friends and there may be no great urgency to work your way into each other’s friendship circles as a way of deepening your own bond. Personal boundaries are important to you, and you respect each other’s personal space by default."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You likely share a slower pace of life and appreciate the need for down time to balance out the busyness. Neither of you feels a burning desire to attend party after relentless party, and it’s likely that you’re on the same page regarding the booking of your social calendar. The problem is that when you do make plans, it can be dangerously easy for you to talk each other out of them. Hiding away is not healthy or practical. If your relationship is a priority, one of you must bite the bullet and motivate the other to follow through."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Despite both being introverts, one partner may need more down time than the other, or you may have different social needs. It’s a balancing act to sync your calendars and maintain a balance between your respective needs. Communication is key, although that too can be challenging as you both tend to shy away from confrontation because it’s overstimulating. Acknowledge when you’re bottling up feelings. Making a conscious effort to focus on conversations that take your both out of your comfort zones is the key to discovering new aspects of your relationship."
                        ],

                    ]
                )
                ],


                // INTJ INFP
                ['personality1_id' => 1, 'personality2_id' => 11, 'cover' => 'intj.png', 'content' => json_encode(
                    [
                        ['type' => 'header', 'text' => 'How INTJ and INFP Get Along'],
                        ['type' => 'paragraph', 'text' => 
                            "INTJs and INFPs have some common themes that often arise when they get to know each other. As an INTJ, you'll want to keep these issues in mind when you get to know an INFP."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "As an Intuitive Thinking type, you approach relationships a little differently than the average person. You have a lively mind and an appetite for ideas. More than any other type, you like to spend time with people who can keep up with you mentally and who expose you to new ideas and worldviews. Ultimately, what you are looking for in relationships is intellectual stimulation—although you also appreciate people who can draw out your softer side."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "When relating to your counterpart, bear in mind that as an Intuitive Feeling type, they will tend to be highly idealistic about their relationships. They want authentic connections that reflect their true values, and they want to see who you really are as a person. Intuitive Feelers want to go deep, and revealing yourself to them is a worthwhile endeavor—once they feel they know you, they'll be a tireless cheerleader for your dreams and ambitions."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "When first meeting this person, they may seem to you to have an interesting mind. You may be drawn to their way of seeing things and their unconventional perspectives. However, they may also seem to you to be a bit whimsical. Although they will likely seem intelligent, they may also seem overly emotional or sensitive. They may be a bit wary of you, in turn, as you may seem more blunt and critical than they are entirely comfortable with."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You are logic-driven, whereas your counterpart is values-driven. Although you both like to analyze, your interest lies more with logic and reason—does this make sense? Is it the most efficient, the most even-handed option? On the other hand, your counterpart takes their cues from morality and ethics—how can this work best for people? You may find that although you are drawn into fascinating conversations with this person, those same conversations tend to end in frustration as you simply cannot agree on what's important."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "However, you may benefit from perseverance in this relationship. Your logical, rational nature may at times betray you, leading you to try to apply logic to situations that are ultimately subjective and personal. This person, who at their worst appears capricious and illogical, can help you to tune into your more emotional, caring side and ensure that you don't neglect what makes you human. In particular, they may help you to understand that all decisions cannot be made with the head; sometimes your heart must call the shots."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Conversely, you can help them learn how to balance their decision-making. Although your friend's natural instinct is to do what feels right, you can ask tough questions that help them to consider all aspects of the choice—and make a difficult decision when the situation calls for it. You can also help them learn to advocate for their own needs, and to discover the magic of saying 'no.'"
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Although there are some common problems that can arise in INTJ/INFP relationships, it's important to remember that there's no such thing as a perfectly compatible pair in personality typing. Whether you get along with someone has more to do with your own self-knowledge and your sensitivity to your friend's needs and preferences—not some magic formula. Learning more about your own type with an in-depth assessment is a great place to start to build the self-awareness that is key to successful relationships."
                        ],



                        ['type' => 'header', 'text' => 'Communication Between INTJ and INFP'],
                        ['type' => 'paragraph', 'text' => 
                            "Communication can be a challenge between any two people, and communication between INTJ and INFP personality types is not the exception. By being aware of the issues that often arise when INTJs and INFPs communicate, you can learn how to reach an understanding more quickly."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You and your counterpart share an abstract style of communication. Your conversations will tend to focus on your impressions, ideas, opinions, and theories. You may find yourselves discussing philosophy, the arts, the latest advances in science, or your ideas about how to make the world a better place."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You are likely to find one another interesting and stimulating to talk to. Neither of you is terribly interesting in recounting events in tedious detail or sharing dry facts without any context, and since both of you probably have the experience of getting stuck in such mundane exchanges with other people, talking to one another should be a refreshing break."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Although you share a similar general style of communicating, there is still potential for misunderstandings between the two of you. When working on projects together, you may find that you tend to discuss the overall goals, but neglect to hammer out the details. You are both inclined to talk more about the general idea, and less about the facts and practicalities. When working together to create a plan, make sure you attend to any details that need to be decided, and don't just assume you're on the same page."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "'Still waters run deep' is an apt motto for both of you, and as a result, striking up a conversation may initially be a challenge. But if you can get through the awkward get-to-know you phase, you'll find rich and wonderful opportunities to share thoughts and ideas with each other."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You are both deep, intuitive, and reflective thinkers. You tend to be fascinated with complex ideas and enjoy exploring the meaning of things. Your specific interests may not be the same, but you share a way of thinking about things that is highly complementary. Although it may take you a while to get started, once you're absorbed in conversation with one another, you'll likely both find it fascinating."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Be aware that when communicating with this person, your usual style may come off as overly blunt or even confrontational. Your counterpart pays a lot of attention to the quality of relationships and is constantly monitoring the emotional overtones of any conversation. This means that they are reluctant to say anything controversial or possibly upsetting."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You, on the other hand, have a tendency to call it like it is, without too much concern for how people will react. This can create an imbalance in your dynamic, where your Feeling counterpart is desperately trying to maintain emotional harmony while you relentlessly rock the boat."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You'll be more successful in your communications if you take time to consider the emotional impact of your words. Sure, everyone wants honesty, but most people also like tact. If you're delivering news that may be hard to hear, think about how you can soften the message. And be aware that your ever-so-charming habit of offering unsolicited 'constructive criticism' may not always be taken in the spirit it was intended."
                        ],


                        ['type' => 'header', 'text' => 'INTJ vs. INFP Values'],
                        ['type' => 'paragraph', 'text' => 
                            "Values are intensely personal, and while an INTJ and an INFP can find common ground, there will always be some differences in what you hold dear. However, understand how your INTJ approach to values compares with your INFP counterpart's will help you to appreciate and overcome your differences."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "The two of you share a passion for improvement and a belief that everything can always be made better. You both tend to question rather than simply accept how things are, and you're constantly wondering how innovation and imagination might make for a better way."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "However, though you're both interested in making positive changes, you may differ somewhat in terms of how you define that interest. Your interest tends to focus on innovation in logical realms like technology, business, and the sciences. You're interested in how intelligence and analytical thinking can make the world more advanced, enlightened, prosperous, and efficient. On the other hand, your counterpart takes a more humanistic approach. They are focused on making the world a better place for people—they want to solve world hunger, educate the poor, and bring peace and happiness to all."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Though you'll often find their ideas interesting, they may seem overly idealistic, impractical, or inefficient. And in turn, they may feel your ideas lack a bit of heart. For them, innovative ideas are only compelling when they have the potential to help the human race."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You also have somewhat different values when it comes to relationships. Your partner tends to be intensely interested in people and eager to find out what really matters to them. They are compassionate and emotionally engaged. On the other hand, you tend to be somewhat more detached. You'd often rather engage intellectually than emotionally. You may find your counterpart pushing you to 'get real' and share how you feel about things, while you just want to stick to talking about what you think."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "This person has the potential to help you gain a more well-rounded approach to how you see the world. Because you share a fundamental passion for interesting ideas and positive change, you can connect well on this level. However, your different approach to values creates an opportunity to learn from one another. You can help your friend to to be a bit more hard-headed about their ideas, shoring up their creative idealism with a healthy dose of logic and reason. And your friend can help you open up to the human side of things, and consider the impact of your ideas on the people involved."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You tend to prize hard work and achievement, in contrast with your counterpart, who puts a higher priority on just enjoying life. While you tend to be serious and goal-oriented, they are more relaxed and content to go with the flow. To you, they may appear unmotivated, flaky, or even lazy. But in truth, they just value freedom and flexibility more than you do, and they're willing to give up a few gold stars in favor of a more laid-back lifestyle. To them, your life may seem overly structured, routine, and just plain dull."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You'll probably experience some conflict over your different approaches to life. You'll want your counterpart to get serious, make plans, and stick with something (for once!). On the other hand, they'll bug you to loosen up, relax, and enjoy life. Although this has the potential to be aggravating for both of you, it's also an opportunity for each of you to discover a new style of living. Your partner can help you to become more spontaneous and ensure you are enjoying all that life has to offer. In turn, you can help them improve their ability to be organized, persistent, and responsible when it matters most."
                        ],


                        ['type' => 'header', 'text' => 'INTJ and INFP in Daily Life'],
                        ['type' => 'paragraph', 'text' => 
                            "Lifestyle is an under-appreciated—but extremely important—element of compatibility. Your values and ideals may coincide perfectly, but if you can't agree on how to conduct day-to-day matters, your relationship will always have friction. As an INTJ in a relationship with an INFP, you can expect certain issues to arise in your daily life. Discussing these in advance, and figuring out how to deal with them, will make things go much more smoothly as you develop your relationship."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "The two of you are likely to share a general intellectual curiosity and interest in learning new things. Both of you tend to appreciate the value of culture, the sciences, and the arts, and while you may not share specific hobbies, you'll probably have interests that you can at least mutually appreciate."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "For both of you, discovering new ideas is a lifelong pursuit. You'll probably share a mutual interest in reading, going to museums and cultural events, taking classes for fun, and other activities that allow you to learn and improve your minds. In fact, you may find that learning new things together is a great way to bring you closer."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You also share a low tolerance for the mundane. You both find day-to-day routine somewhat toxic, and you may find that your lives together involve frequent attempts to 'shake things up.' You may dream of traveling around the world together or quitting your jobs to start a new business. This mutual taste for adventure is stimulating for both of you, and helps keep things exciting between you. However, during the inevitable dull periods of your life together, it's likely that you'll both be a bit cranky. Bear in mind that keeping things novel and fresh is key to both of your happiness."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Organization may be a sticking point between the two of you. While you like to establish structure in schedules, plans, and systems, your counterpart takes a more relaxed approach. You may find that disagreements arise over these fundamental differences."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "If you share a physical space, you may disagree over how clean, tidy, and organized it needs to be. You will tend to feel more motivated to keep things in order, while your counterpart will have less of an innate need for organization."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Often, the more organized person in a relationship like yours ends up taking on more responsibilities, simply because they're paying more attention to what needs to be done. This can lead to resentment and imbalance in the relationship. You may feel as if you are the 'adult' in the relationship, while your counterpart may feel nagged and harassed."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "The best way to approach conflicts in this area is to frame your own desire for organization as just that—something you desire. It is generally unproductive to try to convince your partner that your structured, orderly way of doing things is the 'correct' way, but if you approach it as simply stating your own preference, they may be more open to trying to accommodate you. "
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Scheduling can also be an area of conflict for the two of you, as they like to leave things open-ended, while you prefer things planned and settled. Again, compromise is the key. The first step is to acknowledge that you have different approaches, and that each style has its benefits. Then, try to make sure your time together includes both scheduled events and free time for spontaneity, so you each get a chance to be at your best."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You both get overstimulated by too much activity and both enjoy spending quiet time alone. You and your partner might often find yourself at home with takeout and Netflix, or even in the same room without actually talking to each other, and you’re both okay with that. You likely both have small but intimate circles of friends and there may be no great urgency to work your way into each other’s friendship circles as a way of deepening your own bond. Personal boundaries are important to you, and you respect each other’s personal space by default."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "You likely share a slower pace of life and appreciate the need for down time to balance out the busyness. Neither of you feels a burning desire to attend party after relentless party, and it’s likely that you’re on the same page regarding the booking of your social calendar. The problem is that when you do make plans, it can be dangerously easy for you to talk each other out of them. Hiding away is not healthy or practical. If your relationship is a priority, one of you must bite the bullet and motivate the other to follow through."
                        ],
                        ['type' => 'paragraph', 'text' => 
                            "Despite both being introverts, one partner may need more down time than the other, or you may have different social needs. It’s a balancing act to sync your calendars and maintain a balance between your respective needs. Communication is key, although that too can be challenging as you both tend to shy away from confrontation because it’s overstimulating. Acknowledge when you’re bottling up feelings. Making a conscious effort to focus on conversations that take your both out of your comfort zones is the key to discovering new aspects of your relationship."
                        ],
                    ]
                )
                ],

                // INFJ INFP
                // ['personality1_id' => 2, 'personality2_id' => 11, 'cover' => 'infp.png', 'content' => json_encode(
                //     [
                //         ['type' => 'header', 'text' => 'Header'],
                //         ['type' => 'subheader', 'text' => 'Header '],
                //         ['type' => 'paragraph', 'text' => 
                //             "Paragraph"
                //         ],
                //         ['type' => 'list', 'items' => 
                //             [

                //             ] 
                //         ],
                //         ['type' => 'image', 'src' => 'Image1png'],
                //     ]
                // )
                // ],

                // // INTJ ENFP
                // ['personality1_id' => 1, 'personality2_id' => 4, 'cover' => 'enfp.png', 'content' => json_encode(
                //     [
                //         ['type' => 'header', 'text' => 'Header'],
                //         ['type' => 'subheader', 'text' => 'Header '],
                //         ['type' => 'paragraph', 'text' => 
                //             "Paragraph"
                //         ],
                //         ['type' => 'list', 'items' => 
                //             [

                //             ] 
                //         ],
                //         ['type' => 'image', 'src' => 'Image1png'],
                //     ]
                // )
                // ],


                // Empty Sample

                // ['personality1_id' => 1, 'personality2_id' => 2, 'cover' => 'image', 'content' => json_encode(
                //     [
                //         ['type' => 'header', 'text' => 'Header'],
                //         ['type' => 'subheader', 'text' => 'Header '],
                //         ['type' => 'paragraph', 'text' => 
                //             "Paragraph"
                //         ],
                //         ['type' => 'list', 'items' => 
                //             [

                //             ] 
                //         ],
                //         ['type' => 'image', 'src' => 'Image1png'],
                //     ]
                // )
                // ],
 
            ]
        );
    }
}
