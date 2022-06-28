<?php

use Illuminate\Database\Seeder;

class PersonalityInsights extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['overview', 'relationships', 'career', 'development'];
        DB::table('personality_insights')->insert([
            ['personality_id' => 1, 'cover' => 'intj.png', 'content' => json_encode([
                $titles[0] => [
                    ['type' => 'header', 'text' => 'The INTJ Personality Type'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are analytical problem-solvers, eager to improve systems and processes with their innovative ideas. They have a talent for seeing possibilities for improvement, whether at work, at home, or in themselves."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Often intellectual, INTJs enjoy logical reasoning and complex problem-solving. They approach life by analyzing the theory behind what they see, and are typically focused inward, on their own thoughtful study of the world around them. INTJs are drawn to logical systems and are much less comfortable with the unpredictable nature of other people and their emotions. They are typically independent and selective about their relationships, preferring to associate with people who they find intellectually stimulating."
                    ],
                    ['type' => 'header', 'text' => 'What does INTJ stand for?'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJ is one of the sixteen personality types created by Katharine Briggs and Isabel Myers, creators of the Myers-Briggs Type Indicator (MBTI®). INTP stands for Introverted, iNtuitive, Thinking, Judging, which are four core personality traits based on the work of psychologist C.G. Jung."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Each of the four letters of the INTJ code signifies a key personality trait of this type. INTJs are energized by time alone (Introverted), focus on ideas and concepts rather than facts and details (iNtuitive), make decisions based on logic and reason (Thinking) and prefer to be planned and organized rather than spontaneous and flexible (Judging)."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are sometimes referred to as Mastermind personalities because of their strategic, logical way of thinking. Other nicknames for the INTJ include:"
                    ],
                    ['type' => 'list', 'items' => ['The Conceptual Planner (MBTI)', 'The Architect (16Personalities)'] ],
                    ['type' => 'header', 'text' => 'INTJ Values and Motivations'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are perceptive about systems and strategy, and often understand the world as a chess board to be navigated. They want to understand how systems work, and how events proceed: the INTJ often has a unique ability to foresee logical outcomes. They enjoy applying themselves to a project or idea in depth, and putting in concentrated effort to achieve their goals."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs have a hunger for knowledge and strive to constantly increase their competence; they are often perfectionists with extremely high standards of performance for themselves and others. They tend to have a keen interest in self-improvement and are lifelong learners, always looking to add to their base of information and awareness."
                    ],
                    ['type' => 'header', 'text' => 'How Others See the INTJ'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are typically reserved and serious, and seem to spend a lot of time thinking. They are curious about the world around them and often want to know the principle behind what they see. They thoroughly examine the information they receive, and if asked a question, will typically consider it at length before presenting a careful, complex answer. INTJs think critically and clearly, and often have an idea about how to do something more efficiently. They can be blunt in their presentation, and often communicate in terms of the larger strategy, leaving out the details."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Although INTJs aren’t usually warm or particularly gregarious, they tend to have a self-assured manner with people based on their own security in their intelligence. They relate their ideas with confidence, and once they have arrived at a conclusion they fully expect others to see the wisdom in their perceptions. They are typically perfectionists and appreciate an environment of intellectual challenge. They enjoy discussing interesting ideas, and may get themselves into trouble because of their take-no-prisoners attitude: if someone’s beliefs don’t make logical sense, the Mastermind typically has no qualms about pointing that out."
                    ],
                    ['type' => 'header', 'text' => 'Facts about INTJs'],
                    ['type' => 'list', 'items' => 
                        [
                        "On personality trait measures, score as Discreet, Industrious, Logical, Deliberate, Self-Confident, and Methodical",
                        "Among types least likely to suffer heart disease and cardiac problems",
                        "Least likely of all the types to believe in a higher spiritual power",
                        "One of two types with highest college GPA",
                        "Among types with highest income",
                        "Personal values include Achievement",
                        "Of all types, least likely to state that they value Home/family, Financial security, Relationships & friendships, and Community service",
                        "Overrepresented among MBA students and female small business owners",
                        "Commonly found in scientific or technical fields, computer occupations, and legal professions",
                        ] 
                    ],
                    ['type' => 'image', 'src' => ''],
                ],
                $titles[1] => [
                    ['type' => 'header', 'text' => 'INTJ Communication Style'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are direct and detached in their communication. They often naturally see how something could be done better and usually communicate their criticism in a straightforward, logical manner. They are typically independent and calm; they are not so much concerned about being liked or appreciated as they are with being competent and thoughtful. Their communications are typically well thought-out, insightful, and strategic. They often plan well into the future and offer big-picture analysis for improving systems."
                    ],
                    ['type' => 'header', 'text' => 'INTJs as Parents'],
                    ['type' => 'paragraph', 'text' => 
                        "As parents, INTJs are devoted and supportive. They set firm limits and provide consistent reinforcement, but within that structure allow a lot of latitude for their children to explore their own interests and potential. They are encouraging of their childrens' intellectual pursuits and enthusiastic about sharing knowledge."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs enjoy the process of developing a young mind, and get a lot of satisfaction from parenting. They want to develop productive, competent, and self-sufficient children who think for themselves."
                    ],
                    ['type' => 'header', 'text' => 'INTJs in Love'],
                    ['type' => 'paragraph', 'text' => 
                        "In relationships, the INTJ is loyal but independent. INTJs can be almost scientific in choosing a mate and make devoted partners once they have found a match that fits their rigorous list of requirements. They often have clear ideas about what makes for a solid relationship and are unwavering in their pursuit of this ideal."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs often have a passion for self-improvement and are encouraging of their partners' goals and intellectual pursuits. However, they do not usually see the need for frivolous affection or romance, feeling that their devotion should be evident. They are more focused on serving their partners with hard work and resourceful problem-solving than they are on showering them with attention."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs' partners often find them difficult to read, and indeed they do not show emotion easily; they find the process of discussing emotions much too messy and disorganized. They enjoy solving difficult problems, but are often out of their depth when it comes to illogical, unpredictable personal issues."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs value a partner that allows them the independence to achieve their goals, and one who appreciates their efficacy, insight, and ability to offer creative solutions to problems."
                    ],
                    ['type' => 'header', 'text' => 'INTJs and Other Personality Types'],
                    ['type' => 'subheader', 'text' => "Kindred Spirits"],
                    ['type' => 'paragraph', 'text' => 
                        "People of the following types are more likely than most to share the INTJ's values, interests, and general approach to life. They won't necessarily agree on everything, and there's no guarantee they'll always get along, but they're more likely to feel an easy rapport and have plenty of things in common."
                    ],
                    ['type' => 'image', 'src' => 'intj-relationships-1.png'],
                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],
                    ['type' => 'subheader', 'text' => "Intriguing Differences"],
                    ['type' => 'paragraph', 'text' => 
                        "People of the following types are likely to strike the INTJ as similar in character, but with some key differences which may make them seem especially intriguing. The INTJ may find people of these types particularly interesting and attractive to get to know. Relationships between INTJs and these types should have a good balance of commonalities and opportunities to challenge one another."
                    ],
                    ['type' => 'image', 'src' => 'intj-relationships-2.png'],
                    ['type' => 'paragraph', 'text' => 
                         ""
                    ],
                    ['type' => 'subheader', 'text' => "Potential Complements"],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs may not feel an immediate connection with people of the following types, but on getting to know each other, they'll likely find they have some important things in common, as well as some things to teach one other. Although people of these types may not attract the INTJ initially, their relationships present a lot of potential to complement and learn from one other."
                    ],
                    ['type' => 'image', 'src' => 'intj-relationships-3.png'],
                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],
                    ['type' => 'subheader', 'text' => "Challenging Opposites"],
                    ['type' => 'paragraph', 'text' => 
                         "People of the following types present the most potential for personality clash and conflict with the INTJ, but also the best opportunities for growth. Because people of these types have fundamentally different values and motivations from the INTJ's, initially, it may seem impossible to relate. But because they are so different, their strengths are the INTJ's weaknesses, and if they are able to develop a relationship, they can learn a tremendous amount from each other."
                    ],
                    ['type' => 'image', 'src' => 'intj-relationships-4.png'],
                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],

                ],
                $titles[2] => [
                    ['type' => 'header', 'text' => 'INTJ at Work'],
                    ['type' => 'paragraph', 'text' => 
                        "At work, the INTJ excels at creating and implementing innovative solutions to analytical problems. They naturally see possibilities for improvement within complex systems and are organized and determined in implementing their ideas for change."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are comfortable with abstraction and theory but gain the most satisfaction from turning their ideas into reality. They often enjoy working independently or with a small team, taking measured, strategic steps to implement change."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs enjoy working with logical systems that they can understand in depth. They enjoy the challenge of comprehending complex ideas, and want to understand how they can improve the way things work."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "The ideal work environment for an INTJ is logical, efficient, structured, and analytical, with colleagues that are competent, intelligent, and productive. The ideal job for a Mastermind allows them to use their analytical skills to problem-solve in a challenging environment, and to take responsibility for implementing their ideas to create efficient, innovative systems."
                    ],
                    ['type' => 'header', 'text' => 'Top Careers for the INTJ'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are best suited to careers that allow them to use their logical, orderly reasoning to solve interesting problems. Although they are often drawn to STEM fields, INTJs can also be found in business or even the arts. The common theme for satisfied INTJs, however, is that they must be in a career that provides an intellectual challenge."
                    ],
                    ['type' => 'subheader', 'text' => "Top careers for INTJs"],
                    ['type' => 'list', 'items' => [
                        'Aerospace Engineer',
                        'Architect',
                        'Civil Engineer',
                        'Software Developer',
                        'System Analyst',
                        'Computer Scientist',
                        'Management Consultant',
                        'Market Research Analyst',
                        'Top Executive',
                        'Physician or Surgeon',
                        'Chemist or Materials Scientist',
                        'Medical Scientist',
                        'Lawyer',
                        'Judge or Hearing Officer',
                        'Writer',
                    ]],
                    
                    ['type' => 'header', 'text' => 'INTJ Careers to Avoid'],
                    ['type' => 'paragraph', 'text' => 
                        "It is important to note that any personality type can be successful in any occupation. However, some occupations are well suited to the natural talents and preferred work style of the INTJ, while other occupations demand modes of thinking and behavior that do not come as naturally to this type. Occupations that require the Mastermind to operate outside their natural preferences may prove stressful or draining, and often sound unappealing to INTJs who are choosing a career."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "The following occupations have been found to be unpopular among INTJs, based on data gathered from surveys of the general population."
                    ],
                    ['type' => 'list', 'items' => [
                        "Receptionist",
                        "Hotel Clerk",
                        "Secretary",
                        "Telemarketer",
                        "Recreation Worker",
                        "Teacher's Aide",
                        "Preschool Teacher",
                        "Home Health Aide",
                        "Production Worker",
                        "Advertising Sales Agent",
                        "Dental Hygienist",
                        "Licensed Practical Nurse",
                        "Medical Assistant",
                        "Nurse's Aide",
                        "Social Worker",
                    ]],
                    ['type' => 'header', 'text' => 'The INTJ on a Team'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are analytical team members who focus on strategy. They are often perceptive about systems and how to improve them. They are thoughtful and clear in their analysis, and good at defining team goals. They are capable of synthesizing ideas of some complexity, and often see clearly to a unifying plan of action. INTJs take a characteristically critical approach, and analyze ideas and proposals with a detached, objective logic. They want to be free to make improvements to existing systems, and do best on a team where change is favored."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are open to ideas, and will consider the perspectives of the team members with an even-handed approach. However, they are firm and clear in their logical analysis, and have little patience for nonsense. They are unlikely to offer support or assurance to teammates who they don’t perceive as useful contributors. They are persuasive in their reasoning and often get teammates on board based on the clarity of their ideas. However, they may have friction with team members who have a focus on relationships; the Mastermind seeks a free exchange of ideas, not a personal connection."
                    ],
                    ['type' => 'header', 'text' => 'The INTJ as a Leader'],
                    ['type' => 'paragraph', 'text' => 
                        "In leadership positions, INTJs are strategic, analytical planners and problem solvers. They are good at making tough decisions and sorting out complex issues. Masterminds excel at managing projects that implement a vision of improved efficiency or innovation, and although they usually prefer not to have to manage other people, they will take over if no other leader steps up. As leaders, they are democratic and hands-off: they generally prefer to share the overall goal and let their reports determine exactly how to complete their work."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs value competence and decisiveness, and may sometimes neglect to listen to differing opinions once their mind is made up. While they focus on creating logical and innovative solutions, they may sometimes leave out the details of their plans, leaving their teams to wonder exactly how things will be accomplished."
                    ],

                ],
                $titles[3] => [
                    ['type' => 'header', 'text' => 'INTJ Strengths'],
                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],
                    ['type' => 'subheader', 'text' => '  Strategy'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs not only see the plan or course of action, they are ready and prepared with several back-ups depending on the various circumstances that could possibly arise. With their expansive, future-focused vision for seeing possibilities and recognizing potential, they are also detailed and logical enough to see holes, gaps and inconsistencies."
                    ],
                    ['type' => 'subheader', 'text' => '  Innovation'],
                    ['type' => 'paragraph', 'text' => 
                        "Though the INTJ may outwardly appear intractable, as a type they are actually quite receptive to and supportive of change and innovation, and this open approach helps to enhance their problem-solving savvy. They believe that most people, processes and systems have the potential to be improved upon and they will seek new and creative ways to try to bring about that change."
                    ],
                    ['type' => 'subheader', 'text' => '  Determination'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are revered for their bravery and steadfastness in the face of challenge. They are characteristically determined in whatever they are doing, even to the point of relentless, and are not afraid to move in to tackle the really difficult challenges. Rather than feeling daunted or frustrated, this excites and exhilarates them. They trust their judgment and are confident in their ability to solve the problems and overcome the challenges they encounter in their personal or professional lives."
                    ],
                    ['type' => 'subheader', 'text' => '  Willingness to Learn'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs aren’t only looking to change externals and other people. They are also diligently committed to working on themselves. Though they won’t typically dwell long upon their feelings and emotional state, they are fully engaged in the work of self-improvement. They are lifelong learners and will always be looking for ways to increase their knowledge and skills."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],
                    ['type' => 'header', 'text' => 'INTJ Weaknesses'],
                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],
                    ['type' => 'subheader', 'text' => '  Superiority'],
                    ['type' => 'paragraph', 'text' => 
                        "The INTJ’s prowess in the area of intellect, logic and reason is unarguable and definitely among their chief strengths, as is their confidence in their ideas. However, these strengths can turn into weaknesses when they morph into a superiority complex. Unfortunately, among INTJs, this is not uncommon. They may be arrogant and condescending, as well as impatient with people who don’t catch on as quickly as they’d like. With those who demonstrate less ability to think logically and rationally, they may be particularly judgmental and intolerant."
                    ],
                    ['type' => 'subheader', 'text' => '  Emotional Distance'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are also known for their low EQ and unwillingness to engage the emotions—their own or others. Preferring to conceptualize the world on a logical, rational basis, they tend to have little patience for emotional concerns. They struggle to pick up on and respond to the emotional cues and needs of others. This can stifle interpersonal relationships, as well as their own growth and development, and may end up keeping others at (at least) arm’s distance."
                    ],
                    ['type' => 'subheader', 'text' => '  Perfectionism'],
                    ['type' => 'paragraph', 'text' => 
                        "While the meticulousness of the INTJ can be a strength, as in all things, too much of a strength can easily become a weakness, and for the INTJ, this natural fastidiousness quickly becomes perfectionism, and in this they can be quite fierce and painstaking. Their standards in general are exacting and this critique may be directed not only toward themselves, but toward others as well."
                    ],
                    ['type' => 'subheader', 'text' => '  Imbalance'],
                    ['type' => 'paragraph', 'text' => 
                        "The INTJ places a high priority on work and will be quite devoted to his or her professional life. But this comes at a price, namely in time that might be spent on family, other relationships and leisure. It is easy for the INTJ to find him or herself with misplaced priorities and, as a result, relational problems. While their drive to succeed professionally can certainly pay off, it can take a toll on the rest of their lives."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],
                    ['type' => 'header', 'text' => 'INTJ Growth and Development'],
                    ['type' => 'paragraph', 'text' => 
                        "In order to reach their full potential, INTJs should:"
                    ],
                    ['type' => 'subheader', 'text' => 'Go outside of themselves!'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs are internal processors and accustomed to finding the right answers or the best plans within their own minds. However, such a constant internal focus can mean the INTJ may miss important details, as well as the potentially insightful and helpful contributions of others. To improve their own ideas and plans, INTJs should seek input from friends, family and colleagues. Though the INTJ has full confidence in his or her own abilities, conferencing with others can breathe new life into a stale approach and can help to uncover blind spots."
                    ],
                    ['type' => 'subheader', 'text' => 'Go inside'],
                    ['type' => 'paragraph', 'text' => 
                        "INTJs don’t naturally introspect deeply or spend much time considering their emotional state. They focus internally on their many ideas and abstract concepts, but when it comes to looking at themselves and their feelings, they often avoid the activity. Out of touch with their own blind spots and character defects, INTJs can be quick to find fault with others. One solution is to work on cultivating humility and compassion."
                    ],
                    ['type' => 'subheader', 'text' => 'Balance'],
                    ['type' => 'paragraph', 'text' => 
                        "It is easy for the INTJ to become completely consumed with work or some project or plan that he or she has devised. In the moment, this will feel exhilarating for the individual, but may have consequences for personal wellbeing and relationships in the long run. The INTJ should strive for better work-life balance. That also means, as mentioned, taking time to examine his or her emotions and responses. It won’t come naturally, but will help interpersonal relationships immensely."
                    ],
                    ['type' => 'subheader', 'text' => 'Pick their battles'],
                    ['type' => 'paragraph', 'text' => 
                        "It is not necessary to argue every single point, though the INTJ’s Thinking nature will compel him or her to do so. This is the default response of their perfectionistic hyper-logical nature. Thus, to better navigate all areas of life, the individual may need to understand that sometimes you have to let the small things go so you can accomplish the big things in the long run."
                    ],
                    ['type' => 'subheader', 'text' => 'If it ain’t broke…and even if it is'],
                    ['type' => 'paragraph', 'text' => 
                        "The INTJ may need to resist the desire to be continually improving and changing. Their view on potential and possibilities for all products, systems and people, leads them to want to always be fixing and “improving.” What they may not realize is that not all people want to be fixed and not all companies want greater efficiency."
                    ],
                ],
            ])],
            ['personality_id' => 2, 'cover' => 'infj.png', 'content' => json_encode([
                $titles[0] => [
                    ['type' => 'header', 'text' => 'The INFJ Personality Type'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are creative nurturers with a strong sense of personal integrity and a drive to help others realize their potential. Creative and dedicated, they have a talent for helping others with original solutions to their personal challenges."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "The Counselor has a unique ability to intuit others' emotions and motivations, and will often know how someone else is feeling before that person knows it himself. They trust their insights about others and have strong faith in their ability to read people. Although they are sensitive, they are also reserved; the INFJ is a private sort, and is selective about sharing intimate thoughts and feelings."
                    ],
                    ['type' => 'header', 'text' => 'What does INFJ stand for?'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJ is one of the sixteen personality types created by Katharine Briggs and Isabel Myers, creators of the Myers-Briggs Type Indicator (MBTI®). INFJ stands for Introversion, iNtuition, Feeling, and Judging, which are four core personality traits based on the work of psychologist C.G. Jung."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Each of the four letters of the INFJ code signifies a key personality trait of this type. INFJs are energized by time alone (Introverted), focus on ideas and concepts rather than facts and details (iNtuitive), make decisions based on feelings and values (Feeling) and prefer to be planned and organized rather than spontaneous and flexible (Judging)."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "The INFJ personality type is also called the 'Counselor' because of their tendency to be idealistic, compassionate, and sensitive. Other nicknames for the INFJ include:"
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            "The Insightful Visionary (MBTI)",
                            "The Advocate (16Personalities)"
                        ] 
                    ],
                    ['type' => 'header', 'text' => 'INFJ Values and Motivations'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are guided by a deeply considered set of personal values. They are intensely idealistic, and can clearly imagine a happier and more perfect future. They can become discouraged by the harsh realities of the present, but they are typically motivated and persistent in taking positive action nonetheless. The INFJ feels an intrinsic drive to do what they can to make the world a better place."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs want a meaningful life and deep connections with other people. They do not tend to share themselves freely but appreciate emotional intimacy with a select, committed few. Although their rich inner life can sometimes make them seem mysterious or private to others, they profoundly value authentic connections with people they trust."
                    ],
                    ['type' => 'header', 'text' => 'How Others See the INFJ'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs often appear quiet, caring and sensitive, and may be found listening attentively to someone else’s ideas or concerns. They are highly perceptive about people and want to help others achieve understanding. INFJs are not afraid of complex personal problems; in fact, they are quite complex themselves, and have a rich inner life that few are privy to. They reflect at length on issues of ethics, and feel things deeply. Because Counselors initially appear so gentle and reserved, they may surprise others with their intensity when one of their values is threatened or called into question. Their calm exterior belies the complexity of their inner worlds."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Because INFJs are such complex people, they may be reluctant to engage with others who might not understand or appreciate them, and can thus be hard to get to know. Although they want to get along with others and support them in their goals, they are fiercely loyal to their own system of values and will not follow others down a path that does not feel authentic to them. When they sense that their values are not being respected, or when their intuition tells them that someone’s intentions are not pure, they are likely to withdraw."
                    ],

                    ['type' => 'header', 'text' => 'Facts about INFJs'],
                    ['type' => 'list', 'items' => 
                        [
                            "Least common type in the population",
                            "On personality trait scales, scored as Sincere, Sympathetic, Unassuming, Submissive, Easygoing, Reserved and Patient",
                            "Among highest of all types in college GPA",
                            "Among most likely to stay in college",
                            "Most likely of all types to cope with stress by seeing a therapist",
                            "Highest of all types in marital dissatisfaction",
                            "Personal values include Spirituality, Learning, and Community Service",
                            "Commonly found in careers in religion, counseling, teaching, and the arts",
                        ] 
                    ],

                    
                ],
                $titles[1] => [
                    ['type' => 'header', 'text' => 'INFJs in Love'],
                    ['type' => 'paragraph', 'text' => 
                        "In relationships, the INFJ is supportive and guided by a sense of integrity. The INFJ's interest in human development applies to their mates as well, and they are encouraging of their partner's dreams, aspirations, and achievements."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs want to maintain harmony in their relationships and are highly motivated to resolve conflicts. They tend to be creative problem-solvers and look for the emotional core of an issue to create a meeting of the minds. Although they desire cooperation, they are not willing to go along with an idea that does not feel authentic to them. When it comes to their core values and ethics, they are unwilling to compromise."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs want a high degree of intimacy and emotional engagement, and are happiest when they feel they are sharing their innermost thoughts and feelings with their mates. INFJs value a partner who respects their deeply held values and ethics, and one who appreciates their creativity and inspiration."
                    ],
                    ['type' => 'header', 'text' => 'INFJs as Parents'],
                    ['type' => 'paragraph', 'text' => 
                        "As parents, INFJs are devoted and loving. They tend to form strong bonds with their children and are very closely tuned in to their emotional states. Counselor parents naturally see the possibilities in their children and encourage them to develop their potential."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Although they support their children in their individual interests, INFJ parents are firm disciplinarians, particularly when it comes to moral or ethical concerns. They are concerned with their children's emotional health and spiritual development, and want to create a nurturing atmosphere that promotes growth and well-being."
                    ],
                    ['type' => 'header', 'text' => 'INFJ Communication Style'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are reserved about communication, and often keep their most treasured ideas and insights private. They are oriented to values and connection, and will search for meaning in the information they take in. They think deeply and often need time to process and evaluate before they are ready to share their ideas. They seek validation and will take the time to appreciate others and their ideas. They are often talented at making connections to bring people together and integrate ideas, values, and human potential."
                    ],
                    ['type' => 'header', 'text' => 'INFJs and Other Personality Types'],
                    ['type' => 'subheader', 'text' => 'Kindred Spirits'],
                    ['type' => 'paragraph', 'text' => 
                        "People of the following types are more likely than most to share the INFJ's values, interests, and general approach to life. They won't necessarily agree on everything, and there's no guarantee they'll always get along, but they're more likely to feel an easy rapport and have plenty of things in common."
                    ],

                    // HHHHHHHHEEEEEEEEEEEEERRRRRRRRRRRREEEEEEEEEEEEEE
                    ['type' => 'image', 'src' => 'infj-relationships-1.png'],
                    ['type' => 'subheader', 'text' => 'Intriguing Differences'],
                    ['type' => 'paragraph', 'text' => 
                        "People of the following types are likely to strike the INFJ as similar in character, but with some key differences which may make them seem especially intriguing. The INFJ may find people of these types particularly interesting and attractive to get to know. Relationships between INFJs and these types should have a good balance of commonalities and opportunities to challenge one another."
                    ],
                    ['type' => 'image', 'src' => 'infj-relationships-2.png'],
                    ['type' => 'subheader', 'text' => 'Potential Complements'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs may not feel an immediate connection with people of the following types, but on getting to know each other, they'll likely find they have some important things in common, as well as some things to teach one other. Although people of these types may not attract the INFJ initially, their relationships present a lot of potential to complement and learn from one other."
                    ],
                    ['type' => 'image', 'src' => 'infj-relationships-3.png'],
                    ['type' => 'subheader', 'text' => 'Challenging Opposites'],
                    ['type' => 'paragraph', 'text' => 
                        "People of the following types present the most potential for personality clash and conflict with the INFJ, but also the best opportunities for growth. Because people of these types have fundamentally different values and motivations from the INFJ's, initially, it may seem impossible to relate. But because they are so different, their strengths are the INFJ's weaknesses, and if they are able to develop a relationship, they can learn a tremendous amount from each other."
                    ],
                    ['type' => 'image', 'src' => 'infj-relationships-4.png'],
                ],
                $titles[2] => [
                    ['type' => 'header', 'text' => 'The INFJ at Work'],
                    ['type' => 'paragraph', 'text' => 
                        "At work, the INFJ is focused on the task of bettering the human condition. INFJs are dedicated, helpful, and principled workers who can be relied on to envision, plan, and carry out complex projects for humanitarian causes."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Although they are typically driven by lofty ideals, Counselors gain the most satisfaction from their work when they can turn their ideas into reality, creating constructive change for other people."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are typically organized and prefer work that allows them to complete projects in an orderly manner. They are often independent and tend to prefer a quiet environment that allows them the opportunity to fully develop their own thoughts and ideas."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "The ideal work environment for an INFJ is harmonious, industrious, and oriented to a humanitarian mission, with co-workers who are similarly committed to positive change. The ideal job for a Counselor allows them to use their creativity in an independent, organized environment to develop and implement a vision that is consistent with their personal values."
                    ],

                    ['type' => 'header', 'text' => 'Top Careers for the INFJ'],
                    ['type' => 'paragraph', 'text' => 
                        "The top driver for INFJs in choosing a career is the opportunity to do something that is consistent with their values. Often, INFJs choose careers in helping professions like health care, education, or counseling. INFJs are thinkers by nature and appreciate careers that allow them to use their intellect on problems that interest them. Often, these are people problems, for instance in psychology, but INFJs can also be found in other areas of the sciences and even engineering."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Many INFJs have a creative streak which can be seen in the top INFJ career trends. Working with language is especially popular for INFJs, but they can also be found in various fields in the arts."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Top career choices for INFJs include:"
                    ],

                    ['type' => 'subheader', 'text' => 'Health Care'],
                    ['type' => 'paragraph', 'text' => 
                        "Health care careers are a wonderful opportunity for INFJs to combine their deep caring for the welfare of other people with their often formidable intellectual capabilities. Many INFJs enjoy the sciences and find it extremely satisfying to put their scientific knowledge to use in helping others. Sample health care careers for INFJs include:"
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'Physical Therapist',
                            'Public Health Educator',
                            'Family Physician',
                            'Psychiatrist',
                            'Nutritionist',
                            'Medical Researcher',
                        ]
                    ],
                    ['type' => 'subheader', 'text' => 'Language and Arts'],
                    ['type' => 'paragraph', 'text' => 
                        "Many INFJs love the expressive quality of language, and they typically have the focus and concentration necessary to be excellent writers and editors. Other areas of the arts appeal as well. Sample artistic careers for INFJs include:"
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'Writer',
                            'Translator',
                            'Graphic Designer',
                            'Librarian',
                            'Interior Designer',
                            'Animator',
                        ] 
                    ],
                    ['type' => 'subheader', 'text' => 'Counseling and Social Service'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are typically wonderful listeners and deep, insightful thinkers when it comes to personal problems. They have a high degree of intuition about people and a deep well of patience in dealing with sticky emotional situations. All of these qualities make them talented, compassionate counselors, social servicepeople, and religious workers. Sample counseling and social service careers for INFJs include:"
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'Clinical Psychologist',
                            'Counselor',
                            'Social Worker',
                            'Speech Pathologist',
                        ] 
                    ],
                    ['type' => 'subheader', 'text' => 'Sciences'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs often enjoy the intellectual challenge of the sciences, and can be found in scientific careers that relate to their values. Sample science careers for INFJs include:"
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'Social Scientist',
                            'Genealogist',
                            'Food Scientist',
                            'Environmental Scientist',
                        ] 
                    ],
                    ['type' => 'subheader', 'text' => 'Business & Law'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are often found making the business world a little more human, in HR, training, or the more humanitarian professions within the law. Sample careers for INFJs in the business and legal fields include:"
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'HR Manager',
                            'Legal Mediator',
                            'Environmental Attorney',
                            'Corporate Trainer',
                        ] 
                    ],
                    ['type' => 'subheader', 'text' => 'Education'],
                    ['type' => 'paragraph', 'text' => 
                        "Although teaching in front of a classroom is a typically Extraverted activity and can be a challenge for more Introverted INFJs, they often find it deeply satisfying to help children and adults grow and develop. Education careers that involve working with smaller groups, or one-on-one, are an especially good fit. Sample education careers for INFJs include:"
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'Elementary Teacher',
                            'Special Education Teacher',
                            'School Counselor',
                        ] 
                    ],


                    ['type' => 'header', 'text' => 'INFJ Careers to Avoid'],
                    ['type' => 'paragraph', 'text' => 
                        "It is important to note that any personality type can be successful in any occupation. However, some occupations are well suited to the natural talents and preferred work style of the INFJ, while other occupations demand modes of thinking and behavior that do not come as naturally to this type. Occupations that require the INFJ to operate outside their natural preferences may prove stressful or draining, and often sound unappealing to Counselors who are choosing a career."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "The following occupations have been found to be unpopular among INFJs, based on data gathered from surveys of the general population."
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'Sales Manager',
                            'Restaurant Manager',
                            'Firefighter',
                            'Mechanic',
                            'Farmer',
                            'Military Officer',
                            'Electrician',
                            'Paramedic',
                            'Police Officer',
                            'Cook',
                        ] 
                    ],

                    ['type' => 'header', 'text' => 'The INFJ on a Team'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are creative solvers of people problems, and bring innovative ideas for fostering human potential. They are usually perceptive in observing the talents of others, and good at encouraging teammates to contribute their skills. They are mindful of group process, listening attentively to the opinions of others and synthesizing varied priorities to create a unified vision. Because they prefer to accommodate all points of view, Counselors may have trouble on very competitive or conflictual teams."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "On a team, the INFJ acts as a source of quiet inspiration and vision, and provides clarity of purpose to the group. INFJs seek meaning and truth, and will reflect on ideas to create a deeper understanding. Although they don’t often call attention to themselves, they can provide insight into the ethical and humanitarian issues at hand, and can often elegantly articulate the group’s mission. Counselors work best on a supportive team where they can consider issues of ethics and values and act with integrity. Teams which move to act quickly without taking time to reflect may alienate the INFJ."
                    ],

                    ['type' => 'header', 'text' => 'The INFJ as a Leader'],
                    ['type' => 'paragraph', 'text' => 
                        "In leadership positions, INFJs motivate others by sharing a positive vision. Counselor leaders are often quiet and unassuming, but win other's dedication through their own hard work, strong principles, and inspiring ideas. They are at their best when guiding a team to commit to a common vision, and when creating organizational goals to benefit people. They are insightful and creative, and bring a sense of confidence and commitment to projects they believe in."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Because INFJ leaders are often motivated by personal values, they do best in organizations with a mission consistent with these values. Their challenge is to keep their ideas and initiatives realistic, and to consider practicalities as they plan for change."
                    ],

                ],
                $titles[3] => [
                    ['type' => 'header', 'text' => 'INFJ Strengths'],
                    
                    ['type' => 'subheader', 'text' => 'Practical insight'],
                    ['type' => 'paragraph', 'text' => 
                        "Some people are visionaries while others are down-to-earth problem solvers, but INFJs manage to straddle the line between both identities—and they usually succeed masterfully. INFJs are insightful thinkers who see through situations and people effectively and enjoy developing practical strategies for action. "
                    ],
                    ['type' => 'subheader', 'text' => 'Compassion'],
                    ['type' => 'paragraph', 'text' => 
                        "As a Feeling type, you might expect an INFJ to show compassion—but what sets them apart is that their empathy comes with a sharp intuitive edge. They are quick to recognize worry and unhappiness in friends and loved ones, even when outward signs of distress are not visible to others. INFJs are uniquely capable of detecting unspoken and unacknowledged suffering, and are called into action by their instinctive ability to see beneath the surface."
                    ],
                    ['type' => 'subheader', 'text' => 'Keeping the peace'],
                    ['type' => 'paragraph', 'text' => 
                        "Mediating disputes is hard work, but INFJs have an astounding ability to help heal the rifts that divide people. They intuitively sense the real suffering that anger can cause if left to fester, and because they are good listeners they are quite effective at helping warring parties find workable solutions that will satisfy the needs of all. And they do it with great energy and determination."
                    ],
                    ['type' => 'subheader', 'text' => 'Decisiveness'],
                    ['type' => 'paragraph', 'text' => 
                        "For INFJs, obstacles exist to be overcome and no problem can outmatch the strength and resilience that these types possess deep inside. INFJs follow through on their ideas with conviction, and have the willpower and decisiveness necessary to see projects through to the end. INFJs live for the opportunity to solve problems and bring about positive change in the world."
                    ],


                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],


                    ['type' => 'header', 'text' => 'INFJ Weaknesses'],
                    
                    ['type' => 'subheader', 'text' => 'Overlooking details'],
                    ['type' => 'paragraph', 'text' => 
                        "No matter how practically-oriented they aspire to be, INFJs have a tendency to get so caught up in theorizing the big picture that they forget to account for some of the precious details that can separate success from failure. Details always matter, and while INFJs may recognize this in principle, in practice they aren’t always as diligent about the small stuff as they should be."
                    ],
                    ['type' => 'subheader', 'text' => 'Intensely private'],
                    ['type' => 'paragraph', 'text' => 
                        "Despite their loving and sensitive natures, INFJs have a tendency to close themselves off from the world and don’t give people the chance to know them or see the wonderful qualities they possess. Even in their relations with family and trusted friends, INFJs can be enigmatic. When they are feeling frustrated or introspective, they may retreat from social contact without so much as a word of explanation, which can throw others for a loop."
                    ],
                    ['type' => 'subheader', 'text' => 'Conflict averse'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs dislike conflict intensely and will usually intervene to stop it, but this is one area where their perspective can get distorted. INFJs often fail to recognize that conflict can actually serve a useful purpose, allowing a good process of give-and-take to be established and giving all parties the opportunity to resolve their problem forever. INFJs would be wise to acknowledge the value of open and honest dialogue, instead of automatically assuming that all squabbling is harmful."
                    ],
                    ['type' => 'subheader', 'text' => 'Sensitive'],
                    ['type' => 'paragraph', 'text' => 
                        "Once an INFJ has made up their mind, they tend to be very confident in their conclusions and may not have much tolerance for those who continue to dissent. When someone challenges their conclusions, they can react very strongly and are especially vulnerable to criticism."
                    ],


                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],


                    ['type' => 'header', 'text' => 'INFJ Growth and Development'],
                    
                    ['type' => 'subheader', 'text' => 'Question their intuition'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs have outstanding instincts for the most part, but sometimes their intuition betrays them when they are dealing with others. When something is bothering them, INFJs will often withdraw into the safety of their own heads rather than speaking openly about what they are feeling; conversely, they seldom express their feelings of love, affection and appreciation as directly as might be expected given the depth of the emotions they experience. To improve their communication habits, INFJs should go out of their way to share their feelings—both good and bad—with others regardless of how uncomfortable it makes them feel to do so. "
                    ],
                    ['type' => 'subheader', 'text' => 'Give others the benefit of the doubt'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are insightful, instinctive and persuasive. But despite the enormous effort that INFJs invest in developing and selling their concepts and ideas, sometimes dissidents will remain. INFJs sometimes become disenchanted with those who refuse to accept their conclusions, and they will convince themselves that their opponents have hidden agendas and are acting in bad faith. When situations like this arise, INFJs should try to accept that total consensus is impossible and that some will continue to hold contrary viewpoints. In situations like this, both sides should simply agree to disagree and move on. "
                    ],
                    ['type' => 'subheader', 'text' => 'Let others agree to disagree, too'],
                    ['type' => 'paragraph', 'text' => 
                        "When tensions are high and arguments are heated, INFJs will do all they can to restore lost cohesion and tranquility. But their love of harmony and aversion to division is so powerful that INFJs refuse to accept that sometimes the best way to end disputes is to bring them out into the open, where bridges of understanding can be built. On balance, INFJs’ dislike of conflict is a good thing. But their efforts to play peacemaker might be more successful if they would concentrate on keeping the lines of communication open when disagreements arise instead of always trying to sweep everything under the rug."
                    ],
                    ['type' => 'subheader', 'text' => 'Make connections with extraverts'],
                    ['type' => 'paragraph', 'text' => 
                        "Because sharing with anyone outside a small trusted circle goes against their instincts, too often talented INFJs choose to keep their gifts wrapped up and hidden even though they have much to contribute. But INFJs would benefit by cultivating friendly relationships with extraverted people whenever possible. Opposites attract, and there is no doubt that being around more naturally open and communicative people can help bring INFJs out of their shells and out into the world where others can benefit from their intellect, empathy and compassion. "
                    ],
                    ['type' => 'subheader', 'text' => 'Slow down!'],
                    ['type' => 'paragraph', 'text' => 
                        "INFJs are productive and effective when they make a concerted effort to focus on one project at a time. But their fertile imaginations frequently undermine their efforts to stay on the straight and narrow, and they will often start new projects based on fresh inspirations before old ones are finished—and, before they know it, they will find themselves buried under an avalanche of work. There is really nothing INFJs can do to moderate the pace of their inspirations, but if they constantly remind themselves to slow down and take things one at a time, they may be able to resist the urge to go off on tangents at least some of the time. "
                    ],





                ],
            ])],
            ['personality_id' => 11, 'cover' => 'infp.png', 'content' => json_encode([
                $titles[0] => [
                    ['type' => 'header', 'text' => 'The INFP Personality Type'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs are imaginative idealists, guided by their own core values and beliefs. To a Healer, possibilities are paramount; the realism of the moment is only of passing concern. They see potential for a better future, and pursue truth and meaning with their own individual flair."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs are sensitive, caring, and compassionate, and are deeply concerned with the personal growth of themselves and others. Individualistic and nonjudgmental, INFPs believe that each person must find their own path. They enjoy spending time exploring their own ideas and values, and are gently encouraging to others to do the same. INFPs are creative and often artistic; they enjoy finding new outlets for self-expression."
                    ],


                    ['type' => 'header', 'text' => 'What does INFP stand for?'],
                    ['type' => 'paragraph', 'text' => 
                        "INFP is one of the sixteen personality types created by Katharine Briggs and Isabel Myers, creators of the Myers-Briggs Type Indicator (MBTI®). INFP stands for Introversion, iNtuition, Feeling, and Perceiving, which are four core personality traits based on the work of psychologist C.G. Jung. 1"
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Each of the four letters of the INFP code signifies a key personality trait of this type. INFPs are energized by time alone (Introverted), focus on ideas and concepts rather than facts and details (iNtuitive), make decisions based on feelings and values (Feeling), and prefer to be spontaneous and flexible rather than planned and organized (Perceiving)."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        'The INFP personality type is also called the "Healer" because of their sympathetic idealism and gentle compassion for other people. Other nicknames for the INFP include:'
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'The Thoughtful Idealist (MBTI)',
                            'The Mediator (16Personalities)'
                        ] 
                    ],

                    ['type' => 'header', 'text' => 'INFP Values and Motivations'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs value authenticity and want to be original and individual in what they do. They are often concerned with a search for meaning and truth within themselves. Following tradition holds little appeal for the INFP; they prefer to do their own exploration of values and ideas, and decide for themselves what seems right. INFPs are often offbeat and unconventional, but they feel no desire to conform. The INFP would rather be true to themselves than try to fit in with the crowd."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs are accepting and nonjudgmental in their treatment of others, believing that each person must follow their own path. They are flexible and accommodating, and can often see many points of view. It is important to the INFP to support other people; however, the INFP may react strongly if they feel their own values are being violated. They especially hate being steamrolled by people who insist there is one right way to do things. INFPs want an open, supportive exchange of ideas."
                    ],

                    ['type' => 'header', 'text' => 'How Others See the INFP'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs may initially seem cool, as they reserve their most authentic thoughts and feelings for people they know well. They are reflective and often spiritual, and often interested in having meaningful conversations about values, ethics, people, and personal growth. Typically curious and open-minded, the Healer continually seeks a deeper understanding of themselves and of the people around them. They are passionate about their ideals, but private as well; few people understand the depth of the INFP’s commitment to their beliefs."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs are sensitive and empathetic, and engage themselves in a lifelong quest for meaning and authenticity. The mundane aspects of life are of less interest to this type, and they are more excited by interesting ideas than by practical facts. They typically accept others without question, and may take special interest in offbeat points of view or alternative lifestyles. They often have a special affection for the arts, especially the avant garde, as they love experiencing new concepts in self-expression."
                    ],

                    ['type' => 'header', 'text' => 'Facts about INFPs'],
                    ['type' => 'list', 'items' => 
                        [
                            'On personality trait measures, score as Artistic, Reflective, Careless, Sensitive, Flexible, and Appreciative',
                            'Among least likely of all types to suffer heart disease',
                            'In men, among least likely to report chronic pain',
                            'Second highest of all types to report marital dissatisfaction',
                            'Among most likely to have suicidal thoughts in college',
                            'Tend to be more successful than the average in learning a foreign language',
                            'Among types most likely to be dissatisfied with their work',
                            'Personal values include Autonomy and Creativity',
                            'Overrepresented in occupations in counseling, writing, and the arts',
                        ] 
                    ],
                ],
                $titles[1] => [
                    ['type' => 'header', 'text' => 'INFPs in Love'],
                    ['type' => 'paragraph', 'text' => 
                        "In relationships, the INFP is nurturing, empathic, and loyal. Healers select their friends and partners carefully, looking for a strong bond and congruent values. They are self-aware and often spiritual."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs tend to be open-minded and accepting of another's behavior and preferences, so long as their core values are not violated. They support their partners' individuality, and encourage them to explore their interests and ideas."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs look for ways to compromise and accommodate other people, and often have creative solutions to interpersonal problems. They can be very sensitive, but often keep negative reactions to themselves because they are reluctant to engage in confrontation."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Close and harmonious relationships are important to INFPs, although they also need a lot of independent time to think and reflect. They often want plenty of freedom to express themselves and pursue greater self-awareness. They value a partner who is committed and loving, yet provides them with the support they need to independently explore the mysteries of life."
                    ],

                    ['type' => 'header', 'text' => 'INFPs as Parents'],
                    ['type' => 'paragraph', 'text' => 
                        "As parents, INFPs are caring, supportive, and adaptable. They rarely establish a strict or structured household, preferring instead to address problems and situations as they arise. They often allow their children a lot of latitude and influence in making decisions, and may leave the creation and enforcement of household rules up to another parent."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Children of INFPs often find that they have the freedom to express themselves and make their own decisions until they violate their INFP parent's values. When values are in question, the Healer parent becomes firm and inflexible."
                    ],
                    ['type' => 'header', 'text' => 'INFJ Communication Style'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs are gentle, encouraging communicators who enjoy exploring options and ideas. They envision possibilities for people and are often good at coming up with creative, flexible solutions to problems. They are typically attentive listeners who try to adapt their communication style to the people they are dealing with. Compassionate and cooperative, they tend to be appreciative of other people and their ideas, although they may be reserved about sharing their own closely held values and ideas with people they do not know well."
                    ],

                    ['type' => 'header', 'text' => 'INFPs and Other Personality Types'],
                    ['type' => 'subheader', 'text' => 'Kindred Spirits'],
                    ['type' => 'paragraph', 'text' => 
                        "People of the following types are more likely than most to share the INFP's values, interests, and general approach to life. They won't necessarily agree on everything, and there's no guarantee they'll always get along, but they're more likely to feel an easy rapport and have plenty of things in common."
                    ],

                    ['type' => 'image', 'src' => 'infp-relationships-1.png'],
                    ['type' => 'subheader', 'text' => 'Intriguing Differences'],
                    ['type' => 'paragraph', 'text' => 
                        "People of the following types are likely to strike the INFP as similar in character, but with some key differences which may make them seem especially intriguing. The INFP may find people of these types particularly interesting and attractive to get to know. Relationships between INFPs and these types should have a good balance of commonalities and opportunities to challenge one another."
                    ],
                    ['type' => 'image', 'src' => 'infp-relationships-2.png'],
                    ['type' => 'subheader', 'text' => 'Potential Complements'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs may not feel an immediate connection with people of the following types, but on getting to know each other, they'll likely find they have some important things in common, as well as some things to teach one other. Although people of these types may not attract the INFP initially, their relationships present a lot of potential to complement and learn from one other."
                    ],
                    ['type' => 'image', 'src' => 'infp-relationships-3.png'],
                    ['type' => 'subheader', 'text' => 'Challenging Opposites'],
                    ['type' => 'paragraph', 'text' => 
                        "People of the following types present the most potential for personality clash and conflict with the INFP, but also the best opportunities for growth. Because people of these types have fundamentally different values and motivations from the INFP's, initially, it may seem impossible to relate. But because they are so different, their strengths are the INFP's weaknesses, and if they are able to develop a relationship, they can learn a tremendous amount from each other."
                    ],
                    ['type' => 'image', 'src' => 'infp-relationships-4.png'],
                ],
                $titles[2] => [
                    ['type' => 'header', 'text' => 'The INFP at Work'],
                    ['type' => 'paragraph', 'text' => 
                        "At work, the INFP is not particularly driven by money or status, preferring work that aligns with their personal values and allows them to help others. INFPs are typically motivated by vision and inspiration, and want to engage with projects and causes that feel important to them."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs enjoy the process of creative problem-solving, and want to understand complex issues. They appreciate innovation, and want to come up with original ideas to improve circumstances for people. An ideal job for a Healer allows them to express their individuality in the way they work, and takes advantage of their ability to see unique solutions."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs enjoy working autonomously and having control over how and when to complete a project. They often enjoy participating in teams, although they want to be free to put their own personal stamp on their work. When they do work with other people, it's important to the INFP that they be cooperative, supportive, and flexible, and that they have similar passion for their ideals."
                    ],


                    ['type' => 'header', 'text' => 'Top Careers for the INFP'],
                    ['type' => 'paragraph', 'text' => 
                        "Caring, creative INFPs tend to choose careers that let them express their individuality and their personal values. Many INFPs work in helping professions, where they can bring their compassion and empathy to others. INFPs also frequently choose to work in creative and artistic occupations which allow them to think freely and be their unique selves."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "Top careers for the INFP include:"
                    ],

                    ['type' => 'subheader', 'text' => 'Arts, Design, and Communications'],
                    ['type' => 'list', 'items' => 
                        [
                            'Fine Artist',
                            'Fashion Designer',
                            'Graphic Designer',
                            'Photographer',
                            'Multimedia Artist or Animator',
                            'Writer',
                        ]
                    ],
                    ['type' => 'subheader', 'text' => 'Community and Social Service'],
                    ['type' => 'list', 'items' => 
                        [
                            'Mental Health Counselor',
                            'School or Career Counselor',
                            'Social Worker'
                        ] 
                    ],
                    ['type' => 'subheader', 'text' => 'Science and Health Care'],
                    ['type' => 'list', 'items' => 
                        [
                            'Anthropologist',
                            'Psychologist',
                            'Sociologist',
                            'Nutritionist',
                            'Veterinarian',
                        ] 
                    ],
                    ['type' => 'subheader', 'text' => 'Education and Library'],
                    ['type' => 'list', 'items' => 
                        [
                            'Archivist or Curator',
                            'Elementary School Teacher',
                            'Librarian',
                            'Special Education Teacher',
                        ] 
                    ],


                    ['type' => 'header', 'text' => 'INFP Careers to Avoid'],
                    ['type' => 'paragraph', 'text' => 
                        "It is important to note that any personality type can be successful in any occupation. However, some occupations are well suited to the natural talents and preferred work style of the INFP, while other occupations demand modes of thinking and behavior that do not come as naturally to this type. Occupations that require the INFP to operate outside their natural preferences may prove stressful or draining, and often sound unappealing to INFPs who are choosing a career."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "The following occupations have been found to be unpopular among INFPs, based on data gathered from surveys of the general population."
                    ],
                    ['type' => 'list', 'items' => 
                        [
                            'Military Officer',
                            'Police Officer',
                            'Materials Engineer',
                            'Electrician',
                            'Systems Analyst',
                            'Sales Manager',
                            'Financial Manager',
                            'Chemist',
                            'Dentist',
                            'Judge',
                            'Auditor',
                        ] 
                    ],

                    ['type' => 'header', 'text' => 'The INFP on a Team'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs are supportive and imaginative team members who contribute by understanding the ideals of their teammates and working to bring unity to the group’s mission. They listen openly to many points of view, and are talented at coming up with creative solutions that incorporate the ideas and priorities of everyone involved. They are flexible and innovate thinkers, and are willing to consider almost any option, so long as it is congruent with their values."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs do best on a team that is guided by vision, and want to have an authentic understanding of the team’s purpose. They want to have team members who are similarly committed to a cause, and who are willing to explore the possibilities for achieving their ideals. Teams which are highly oriented to action, without considering the deeper issues or the alternative options, may alienate the INFP. INFPs want an environment of mutual support and acceptance, and may have trouble on teams where there is much conflict or competition. Judgment and negativity tend to stifle their talent for creative problem-solving."
                    ],

                    ['type' => 'header', 'text' => 'The INFP as a Leader'],
                    ['type' => 'paragraph', 'text' => 
                        "In leadership positions, INFPs motivate others through encouragement and positive vision. They are deeply idealistic, and when working for a cause that is important to them, they bring a quiet determination to their leadership role. They often see the potential in other people, and are good at inspiring others to use their gifts."
                    ],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs are supportive, creative leaders who encourage their teams to think outside the box. Because of their flexible nature and strong desire for harmony, they may avoid conflict and delay making difficult decisions. They do best leading cooperative teams of like-minded people who are similarly committed to their vision."
                    ], 
                ],
                $titles[3] => [
                    ['type' => 'header', 'text' => 'INFP Strengths'],
                    
                    ['type' => 'subheader', 'text' => 'Idealism'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs care deeply for others and believe it is their duty to make a positive impact on the lives of other people in any way they can. Because of this unbreakable commitment, INFPs are capable of great self-sacrifice, and they won’t compromise their ethical standards for personal benefit. INFPs are firm believers in the unlimited potential of human beings to achieve remarkable things, and they can always be counted on to provide encouragement or material support to those who are attempting to expand their horizons."
                    ],
                    ['type' => 'subheader', 'text' => 'Integrity'],
                    ['type' => 'paragraph', 'text' => 
                        "Integrity means everything to INFPs, and that includes intellectual as well as moral integrity. Some people might accuse INFPs of being overly imaginative or of being willing to stretch logic to the breaking point in order to find the deeper meaning they insist must exist, but there is no denying that the deeply reflective nature of INFPs allows them to transcend the boundaries of imagination that so often prevent us from discovering new solutions to old problems."
                    ],
                    ['type' => 'subheader', 'text' => 'Compromise'],
                    ['type' => 'paragraph', 'text' => 
                        "As empathic idealists, harmonious relations are like a balm to the soul for INFPs. In family settings or when working in groups, INFPs are highly effective as mediators because they are legitimately interested in the viewpoints of all and will go out of their way to make sure that everyone is given a fair hearing. They are enthusiastic advocates of cooperation and believe that no difficulty is insurmountable when people work together for a common cause. "
                    ],
                    ['type' => 'subheader', 'text' => 'Dedication'],
                    ['type' => 'paragraph', 'text' => 
                        "It is easy to pay lip service to virtues like compassion, creativity, originality and open- mindedness, but these ideas don’t mean much unless they can be translated into real-world applications. Fortunately, INFPs are masters at doing just that. Passionate and committed to the cause, these personalities have a unique ability to mold and shape their surrounding environment in ways that promote self- improvement and transcendent achievement for all. "
                    ],


                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],


                    ['type' => 'header', 'text' => 'INFP Weaknesses'],
                    
                    ['type' => 'subheader', 'text' => 'Sensitivity'],
                    ['type' => 'paragraph', 'text' => 
                        "Their deep compassion, sensitivity and commitment to originality allows INFPs to interface with their interpersonal landscapes in a constructive manner, but these feelings also leave them vulnerable to disillusionment and powerful existential angst. INFPs who venture enthusiastically out into the world can end up retreating into lethargy and depression when they discover their idealism isn’t always shared or respected by others, and their incredible talents can go completely to waste when they become too discouraged to continue."
                    ],
                    ['type' => 'subheader', 'text' => 'Impracticality'],
                    ['type' => 'paragraph', 'text' => 
                        "While their insistence on standing up for justice and decency is admirable, the intensity of their feelings can occasionally leave INFPs unwilling to make compromises even when doing so might be necessary to get something accomplished. Sticking to your morals is admirable, but in the real world it may be impossible to accomplish anything unless the INFP can find a way to give and take a little and find practical, if imperfect, solutions to problems. "
                    ],
                    ['type' => 'subheader', 'text' => 'Selflessness'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs have a tendency to neglect or suppress their own needs if they believe it is necessary to keep the peace or make others happy. When a person holds his or her insecurities inside for too long, it can eventually cause a blow-up or an emotional breakdown. Sensitive INFPs often suffer in silence, and this is a pity because INFPs and their fellow travelers usually have people in their lives who care about them a lot and would be more than happy to help them deal with their heartaches and disappointments. "
                    ],
                    ['type' => 'subheader', 'text' => 'Vulnerability'],
                    ['type' => 'paragraph', 'text' => 
                        "Compassionate to the core, INFPs lead with their hearts rather than their heads and this can sometimes set them up for trouble. Unfortunately there are users and manipulators out there who are always on the lookout for easy targets, and from the standpoint of these individuals INFPS might as well have flashing neon signs attached to their foreheads that say “exploit me, exploit me!” Trust is a wonderful thing, but not when it makes you gullible. "
                    ],


                    ['type' => 'paragraph', 'text' => 
                        ""
                    ],


                    ['type' => 'header', 'text' => 'INFP Growth and Development'],
                    
                    ['type' => 'subheader', 'text' => 'Learn to recognize the difference between compromise and concession'],
                    ['type' => 'paragraph', 'text' => 
                        "People who disagree with INFPs are simply seeing things from a different point of view, but to an INFP, it can feel like they are being backed into a corner. Instead of digging in their heels, INFPs must find a way to detach from the situation so they can comprehend the motivations of their opposition more clearly. If it is only a difference in values and not a lack of them that is responsible for divergent opinions, then INFPs should not expect others to give in to stubbornness any more than they would if the shoe were on the other foot."
                    ],
                    ['type' => 'subheader', 'text' => 'Make sure dreams and fantasies are used to enhance reality rather than replace it'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs who look out at the world with idealistic eyes often see grand vistas of beauty and limitless possibility that others are not capable of perceiving. But INFPs sometimes choose to retreat into these fantasies instead of using them to solve real-world problems. Imagination can open the door to better possibilities, and INFPs should never lose sight of its transformative potential."
                    ],
                    ['type' => 'subheader', 'text' => 'Learn to respect the details'],
                    ['type' => 'paragraph', 'text' => 
                        "No matter how wonderfully inventive a new idea might be, it won’t get anywhere if the logistical details required to put it into practice are ignored or neglected. INFPs may find this aspect of the creative processes a bit boring, but they should challenge themselves to overcome their disinterest and pay attention to all those annoying details anyway."
                    ],
                    ['type' => 'subheader', 'text' => 'Seek out leadership positions'],
                    ['type' => 'paragraph', 'text' => 
                        "INFPs have strong egalitarian instincts, are natural conciliators, passionately believe in the utility of cooperation, are excellent listeners, and never fail to pay attention when someone has a new idea to share. These admirable qualities double as superb leadership skills, and no one who possesses them should avoid leadership positions simply because they aren’t extraverts. Above all else, leaders must have the respect of those they presume to lead, and INFPs are just as capable of gaining that respect as any other personality type."
                    ],
                    ['type' => 'subheader', 'text' => 'Accept themselves as they are without apology'],
                    ['type' => 'paragraph', 'text' => 
                        "Because their standards are so high, INFPs have a hard time forgiving themselves when they fail to meet their own expectations. They may also become indecisive and fall into a perfectionism so extreme that it cuts off their flow of creativity and makes it impossible for them to excel and achieve. This dynamic is unfortunate, especially as INFPs would never think of holding others to such impossible standards. For the sake of their mental health and happiness, INFPs must learn to stop comparing themselves to others and recognize that they should prioritize their own happiness."
                    ],


                ],
            ])],
            // ['personality_id' => 4, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 5, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 6, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 7, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 8, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 9, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 10, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 11, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 12, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 13, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 14, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 15, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
            // ['personality_id' => 16, 'cover' => 'image.png', 'content' => json_encode([
            //     $titles[0] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[1] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[2] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            //     $titles[3] => [
            //         ['type' => 'header', 'text' => 'Header 1'],
            //         ['type' => 'paragraph', 'text' => 
            //             "Paragraph 1"
            //         ],
            //         ['type' => 'image', 'src' => 'Image1.png'],
            //     ],
            // ])],
        ]);
    }
}
