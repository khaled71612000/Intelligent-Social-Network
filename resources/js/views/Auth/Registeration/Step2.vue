<template>
    <div class="register-container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Register</h1>
                            <p class="text-muted">Personality Test</p>
                            <h5>The goal of this assessment is to put language to your thought processes, so be careful
                                <span style="font-weight:900">NOT</span> to select an answer based on what you think you
                                "should" be.</h5>
                            <h5>You'll find at most 2 matching options in the first question, try to choose the best
                                option describing you. Feel free to try different options to see where they lead you.
                            </h5>
                            <br><br>
                            <form class="form-check" id="c0" @change="setAnswer($event, 0)">
                                <input class="form-check-input" type="radio" value="0" name="c0">
                                <label class="form-check-label" for="c0">
                                    I like to explore theories and concepts, and see the big picture, then to find out the facts, I can easily think about the abstract & symbolic meanings. I am very oriented around possibility and like to think “What if?”. I can get consumed by what I am thinking, and forget what actually ~is~.  I remember events more as an impression of what it was like than as actual facts or details of what happened. Paying the most attention to impressions or the meaning and patterns of the information I get. I think of so many possibilities that it can get overwhelming at times, and it frustrates me that I am unable to do all the things I can think of.
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c0">
                                <label class="form-check-label" for="c0">
                                    I learn best from experience. Overall I lean more towards realism than airy fairy hopes and dreams. Paying attention to physical reality, what I see, hear, touch, taste, and smell. I'm concerned with what is actual, present, current, and real. I notice facts and I remember details that are important to me. I like to see the practical use of things and learn best when I see how to use what I'm learning. Experience speaks to me louder than words. Sometimes I pay so much attention to facts, either present or past, that I miss new possibilities. I trust experience first and trust words and symbols less. 
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="2" name="c0">
                                <label class="form-check-label" for="c0">
                                    I have a very high value for the emotional state of me and others, and have strong personal beliefs. I feel like I’m really good at understanding people and their feelings. I like to do whatever will establish or maintain harmony. The decisions I make need to be aligned with who I am and what I believe in to sit right with me. I get frustrated when people are overly critical and don’t realize how they’re affecting people. I believe being tactful is more important than telling the "cold" truth. I am sometimes seen by others as too idealistic, mushy, or indirect.
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="3" name="c0">
                                <label class="form-check-label" for="c0">
                                    When I make a decision, I like to find the basic truth or principle to be applied, regardless of the specific situation involved. I notice inconsistencies very easily. I like to analyze pros and cons, and then be consistent and logical in deciding. I spend a lot of time thinking about what is logical, efficient, and accurate. I like learning new information, and I enjoy coming up with optimal solutions to problems. Sometimes I miss or don't value the "people" part of a situation. I can be seen as too task-oriented, uncaring, or indifferent. I believe telling the truth is more important than being tactful, so I struggle to relate to people who chose feelings over facts.
                                </label>
                                <br><br><br><br>
                            </form>


                            <form class="form-check" id="c00" @change="setAnswer($event, 1)"
                                v-if="currentAnswers[0] == 0">
                                <input class="form-check-input" type="radio" value="0" name="c00">
                                <label class="form-check-label" for="c00">
                                    I spend quite a bit of time in my head where a lot of my thoughts happen at a subconscious level. Everything flows together and it's more like a jumble of spaghetti, the stars in the sky, webs of connections, or a formless eternity that I can pluck things from than a filing cabinet where everything is clearly sorted and organized. I'm good at seeing the patterns in things and predicting what will happen by jumping ahead ten steps in my mind. <br>
  My brain usually gives me information in the form of impressions or mental pictures more than specific details and facts. I tend to need a decent amount of alone time, and if I have to be fully present in the moment and engaged with the real world for an extended period of time, it gets really exhausting. I may also be a bit of a perfectionist at times.

                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c00">
                                <label class="form-check-label" for="c00">
                                    My best ideas and creativity are fueled by interacting with the world and people around me. I love exploring ideas and brainstorming with others. I see the world as very open-ended and full of possibilities. I come up with lots of ideas when I’m talking or writing, and it seems like they come out of nowhere in the moment. I don’t like getting locked into things - I prefer to keep my options open as much as possible. Having a group of good people to bounce ideas off of and theorize with is really helpful for me. <br><span style="font-size:95%">I may be a tad bit terrified of commitment. I’ve always had a bit of trouble sticking to things. I always need to be doing something new. I get bored easily or dissatisfied and want to just jump on to the next shiny thing, but it’s easy to forget to make sure that everything lines up first. My biggest fear is that I will spend so much time coming up with ideas that I don't ever pick something and do it.</span>
                                </label>
                                <br><br>
                                <br><br>
                            </form>

                            <form class="form-check" id="c01" @change="setAnswer($event, 1)"
                                v-if="currentAnswers[0] == 1">
                                <input class="form-check-input" type="radio" value="0" name="c01">
                                <label class="form-check-label" for="c01">
                                    I think systematically and am good at planning out the steps needed to make something happen. I have a strong value for consistency and reliability. I tend to 'tried and true' methods. I generally dislike surprises. I prefer to keep things the same unless a change would clearly be better. I have respect for people in higher positions than me, and I generally follow rules and regulations. It frustrates me when the people who designed a particular system or set up specific rules was clearly incompetent, and then I have to navigate the mess they left behind. If I’m in an environment that’s not consistent, predictable, and stable, it can be tough to keep up with every change and adapt to the moment. My biggest fear is letting people down when they’re relying on me. Risk can make me pretty uncomfortable when there's no plan. 
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c01">
                                <label class="form-check-label" for="c01">
                                    I love being able to just be present in the moment and not have to think about the future. I have a strong appreciation for beauty and nature. I'm into adventures, surprises and spontaneity. I prefer doing things in the real world rather than wasting time talking about the theoretical. I love new things and new experiences. I can do really well in high intensity crisis situations or things that call for an eye for beauty, but dealing with day-to-day life in civilization can be really frustrating to me in all of it’s arbitrary details, rules, and regulations. Details can really bog me down.
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c02" @change="setAnswer($event, 1)"
                                v-if="currentAnswers[0] == 2">
                                <input class="form-check-input" type="radio" value="0" name="c02">
                                <label class="form-check-label" for="c02">
                                    The most important thing to me is my personal beliefs. I am quite private and it takes a while for me to trust people. When I’m not sure what I think yet, pressure from not-as-close friends or strangers to “open up” feels way too vulnerable and uncomfortable. I spend a lot of time trying to understand what certain people believe and why they came to believe it. It’s not just people that I know either - I might see someone walk by me and start to think about what kind of person they are, what kind of things they might believe, what their relationship with their parents is like, and how they feel about the clothes they decided to wear that day.<br>
  I feel like I'm especially good at understanding specific people on an individual basis, and I love developing a couple of really deep relationships rather than having a bunch of acquaintances who don't really know me. I think that showing someone you really heard them and understand what they’re saying is way more powerful than giving them advice or telling them “it’s all going to be okay.” I prefer to validate people where they’re at, and remind them that they’re already enough. I hate being misunderstood in relation to my beliefs and values, and I hate feeling like I’m not being seen or heard.
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c02">
                                <label class="form-check-label" for="c02">
                                    The most important thing to me is my relationships. My goal is to help and serve people. I see what people could be and love calling them to their potential, encouraging them, and helping them to figure out a game plan for getting there if needed. I pay attention to the important details of people’s lives and I actively seek ways to meet people’s needs. I like when people feel that I understand them. <br>
  I prefer to talk through my feelings, beliefs and values with people close to me to figure out how I really feel. Once I have explored an emotion or vented it to a someone close, it is easy for me to move on from the situation without being very affected. I sometimes ignore my own feelings and set them aside to deal with separately to create harmony, even if the harmony created by doing so is actually false. My biggest fear is being abandoned or rejected by the people I care about most.
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c03" @change="setAnswer($event, 1)"
                                v-if="currentAnswers[0] == 3">
                                <input class="form-check-input" type="radio" value="0" name="c03">
                                <label class="form-check-label" for="c03">
                                    I spend a long time analyzing the information I take and recalculating everything I know when I run into a contradictory piece of information. I prefer expressing my thoughts and opinions using the writing approach rather than speaking it out loud. I believe that facts are subject to change.
  My default approach to life is to break things down into all their parts and I enjoy analyzing them in order to understand how they work and how to make them better. Most people might think that they can quit learning after high school or college, but to me life is all about growing in knowledge and expertise. Sometimes I struggle to move forward in a project when the piece that I'm currently working on doesn’t quite make sense or I feel like it may be missing something I'm not interested in controlling others and leadership stuff. I sometimes forget that feelings are a thing other people experience. I may accidentally put people off or offend people at times, but don’t realize it until later (if at all). My biggest fear is wasting my potential and never solving any meaningful problems in the world.
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c03">
                                <label class="form-check-label" for="c03">
                                    I am good at making quick, efficient decisions when the moment calls for it. It's more important to me that I keep things moving than it is to have the perfect solution. I love improving things and am big on choosing the most efficient way to do things so I can maximize what actually gets accomplished. I love taking something from 0 to 60, from awful or decent to excellent. I love the taste of victory. I am goal-oriented, but prefer being able to delegate the details of implementation to others so I can steer the ship. I love when people just do what I tell them to. It frustrates me when the person in charge is incompetent and it is not unusual for me to see how I could do their job better than them. I care about people, but sometimes I'm not the most sensitive person. I may have steamrolled people in the past without realizing it. The worst thing I could imagine would be not accomplishing anything in my lifetime.
                                </label>
                                <br><br>
                                <br><br>
                            </form>


                            <form class="form-check" id="c000" @change="setAnswer($event, 2)"
                                v-if="currentAnswers[0] == 0 && currentAnswers[1] == 0">
                                <input class="form-check-input" type="radio" value="0" name="c000">
                                <label class="form-check-label" for="c000">
                                    Te
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c000">
                                <label class="form-check-label" for="c000">
                                    Fe
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c001" @change="setAnswer($event, 2)"
                                v-if="currentAnswers[0] == 0 && currentAnswers[1] == 1">
                                <input class="form-check-input" type="radio" value="0" name="c001">
                                <label class="form-check-label" for="c001">
                                    Ti
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c001">
                                <label class="form-check-label" for="c001">
                                    Fi
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c010" @change="setAnswer($event, 2)"
                                v-if="currentAnswers[0] == 1 && currentAnswers[1] == 0">
                                <input class="form-check-input" type="radio" value="0" name="c010">
                                <label class="form-check-label" for="c010">
                                    Te
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c010">
                                <label class="form-check-label" for="c010">
                                    Fe
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c011" @change="setAnswer($event, 2)"
                                v-if="currentAnswers[0] == 1 && currentAnswers[1] == 1">
                                <input class="form-check-input" type="radio" value="0" name="c011">
                                <label class="form-check-label" for="c011">
                                    Ti
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c011">
                                <label class="form-check-label" for="c011">
                                    Fi
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c020" @change="setAnswer($event, 2)"
                                v-if="currentAnswers[0] == 2 && currentAnswers[1] == 0">
                                <input class="form-check-input" type="radio" value="0" name="c020">
                                <label class="form-check-label" for="c020">
                                    Ne
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c020">
                                <label class="form-check-label" for="c020">
                                    Se
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c021" @change="setAnswer($event, 2)"
                                v-if="currentAnswers[0] == 2 && currentAnswers[1] == 1">
                                <input class="form-check-input" type="radio" value="0" name="c021">
                                <label class="form-check-label" for="c021">
                                    Ni
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c021">
                                <label class="form-check-label" for="c021">
                                    Si
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c030" @change="setAnswer($event, 2)"
                                v-if="currentAnswers[0] == 3 && currentAnswers[1] == 0">
                                <input class="form-check-input" type="radio" value="0" name="c030">
                                <label class="form-check-label" for="c030">
                                    Ne
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c030">
                                <label class="form-check-label" for="c030">
                                    Se
                                </label>
                                <br><br>
                                <br><br>
                            </form>
                            <form class="form-check" id="c031" @change="setAnswer($event, 2)"
                                v-if="currentAnswers[0] == 3 && currentAnswers[1] == 1">
                                <input class="form-check-input" type="radio" value="0" name="c031">
                                <label class="form-check-label" for="c031">
                                    Ni
                                </label>
                                <br><br>
                                <input class="form-check-input" type="radio" value="1" name="c031">
                                <label class="form-check-label" for="c031">
                                    Si
                                </label>
                                <br><br>
                            </form>
                            <div class="row justify-content-center text-center">
                                <div class="col-6">
                                    <router-link to="/register/1"><button class="btn btn-primary px-4">Back</button></router-link>
                                </div>
                                                                <div class="col-6">
                                    <router-link to="/register/3"><button class="btn btn-primary px-4" :title="nAnsweredQuestions < 3 ? 'Please complete the test!' : 'Next Step (Preferences)'" :disabled="nAnsweredQuestions < 3">Next</button></router-link>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapState} from "vuex";
    export default {
        data() {
            return {
                cognitive_stack: '',
                answersCopy:this.$store.state.userForm.test_answers.slice()
            }
        },
        computed: {
            answers: {
                set(value) {
                    this.$store.commit("userForm/SET_TEST_ANSWERS", value);
                },
                get() {
                    return this.userForm.test_answers
                }
            },
            currentAnswers() {
                if (this.nAnsweredQuestions == 3) {
                    this.analyzeResult();
                }
                return this.answersCopy;
            },
            nAnsweredQuestions() {
                return this.answersCopy.filter(el => el != null).length
            },
            ...mapState(['userForm']),
        },
        methods: {
            setAnswer(event, answerIndex) {
                let that = this;
                let questionID = event.currentTarget.getAttribute("id");
                let query = 'input[name="' + questionID + '"]:checked';
                let answerValue = parseInt($(query).val());
                let oldAnswers = this.answers.slice();
                this.currentAnswers.splice(answerIndex, 1, answerValue);
                this.answers[answerIndex] = answerValue

                // clear other answers if necessery
                switch (answerIndex) {
                    case 0:
                        // Clear selected answers from the form of question 2 and 3
                        let query = "input[name='c0" + oldAnswers[0] + "']:checked";
                        $(query).prop('checked', false);
                        query = "input[name='c0" + oldAnswers[0] + oldAnswers[1] + "']:checked";
                        $(query).prop('checked', false);
                        // Clear answers of questions 2 and 3
                        [this.answers[1], this.answersCopy[1]] = [null, null];
                        [this.answers[2], this.answersCopy[2]] = [null, null];
                        break;
                    case 1:
                        // Clear selected answers from the form of question 3
                        query = "input[name='c0" + oldAnswers[0] + oldAnswers[1] + "']:checked";
                        $(query).prop('checked', false);

                        // Clear answers of questions 3
                        [this.answers[2], this.answersCopy[2]] = [null, null];
                        break;
                }
            },
            analyzeResult() {
                let level1 = ['N', 'S', 'F', 'T'];
                let level2 = [
                    ['Ni', 'Ne'],
                    ['Si', 'Se'],
                    ['Fi', 'Fe'],
                    ['Ti', 'Te']
                ];
                let level3 = [
                    ['Te', 'Fe'],
                    ['Ti', 'Fi'],
                    ['Te', 'Fe'],
                    ['Ti', 'Fi'],
                    ['Ne', 'Se'],
                    ['Ni', 'Si'],
                    ['Ne', 'Se'],
                    ['Ni', 'Si']
                ];

                let persona = [];
                let oppisites = {
                    'Ni': 'Se',
                    'Se': 'Ni',
                    'Ti': 'Fe',
                    'Fe': 'Ti',
                    'Fi': 'Te',
                    'Te': 'Fi',
                    'Si': 'Ne',
                    'Ne': 'Si'
                };
                let index = 0;
                let results = [];
                let personality = null;

                let [answer1, answer2, answer3] = [this.answers[0], this.answers[1], this.answers[2]];
                let functionType = level2[answer1];
                let Dominant = functionType[answer2];
                let Auxiliary = level3[answer1 * 2 + answer2][answer3];
                let Tertiary = oppisites[Auxiliary];
                let Inferior = oppisites[Dominant];
                let function_stack = Dominant + Auxiliary //+ Tertiary + Inferior;
                persona.push(function_stack);
                this.cognitive_stack = function_stack;
                console.log(this.cognitive_stack)
                return function_stack
            }
        },

        mounted() {
            if (this.answers[0] != null) {
                $("input[name='c0']")[this.answers[0]].checked = true;
            }
            if (this.answers[1] != null) {
                $("input[name='c0"+this.answers[0]+"']")[this.answers[1]].checked = true;
            }
            if (this.answers[2] != null) {
                $("input[name='c0"+this.answers[0]+this.answers[1]+"']")[this.answers[2]].checked = true;
            }
            //this.answers = [null, null, null];
            // let that = this;
            // that.level1.on("change", (el) => {
            //     that.setAnswer(el.currentTarget, 0);
            //     // that.level2 = $("#c00, #c01, #c02, #c03");
            //     // that.level2.on("change", (el2) => {
            //     //     console.log("LEVEL 2");
            //     //     that.setAnswer(el2.currentTarget, 1);
            //     //     that.level3 = $("#c000, #c001, #c010, #c011, #c020, #c021, #c030, #c031");
            //     //     that.level3.on("change", function(el3){
            //     //         that.setAnswer(el3.currentTarget, 2);
            //     //         });
            //     // });
            // });


            // let that = this;
            // let l2Query = "#c00, #c01, #c02, #c03";
            // let l3Query = "#c000, #c001, #c010, #c011, #c020, #c021, #c030, #c031";
            // document.querySelectorAll(l2Query + "," + l3Query).forEach((el) => {
            //     el.style.display = "none";
            // })
            // let id = "c0"
            // let q1 = document.getElementById(id);
            // let level1 = ['N', 'S', 'F', 'T'];
            // let level2 = [
            //     ['Ni', 'Ne'],
            //     ['Si', 'Se'],
            //     ['Fi', 'Fe'],
            //     ['Ti', 'Te']
            // ];
            // let level3 = [
            //     ['Te', 'Fe'],
            //     ['Ti', 'Fi'],
            //     ['Te', 'Fe'],
            //     ['Ti', 'Fi'],
            //     ['Ne', 'Se'],
            //     ['Ni', 'Si'],
            //     ['Ne', 'Se'],
            //     ['Ni', 'Si']
            // ];

            // let persona = [];
            // let oppisites = {
            //     'Ni': 'Se',
            //     'Se': 'Ni',
            //     'Ti': 'Fe',
            //     'Fe': 'Ti',
            //     'Fi': 'Te',
            //     'Te': 'Fi',
            //     'Si': 'Ne',
            //     'Ne': 'Si'
            // };
            // let index = 0;
            // let results = [];
            // let personality = null;
            // let visibleQuestions = [q1]

            // function spreadEvents(query, callback, params = []) {
            //     let elements = document.querySelectorAll(query);
            //     elements.forEach(el => {
            //         el.addEventListener("change", () => {
            //             if (params.length > 0)
            //                 callback(el, params[0]);
            //             else
            //                 callback(el);
            //         })
            //     })
            // }

            // function display(element) {
            //     element.style.display = "block";
            // }

            // function hide(element) {
            //     element.style.display = "none";
            //     // remove checked radio button
            //     let query = "[name=" + element.getAttribute("id") + "]";
            //     document.querySelectorAll(query).forEach(el => {
            //         el.checked = false
            //     });
            //     that.cognitive_stack = '';
            // }

            // function finishlevel1(q) {
            //     // Check that when user change answer of first question, any visible next-question will be hidden/updated
            //     while (visibleQuestions.length > 1) {
            //         hide(visibleQuestions.pop());
            //         // Remove previously chosen answers
            //         results.pop();
            //     }
            //     results.pop();
            //     let id = q.getAttribute("id");
            //     let checked = q.elements[id].value;
            //     let newId = id + checked;
            //     let nextQuestion = document.getElementById(newId);
            //     display(nextQuestion);
            //     results.push(checked)
            //     visibleQuestions.push(nextQuestion);
            //     spreadEvents(l2Query, finishlevel2, [checked]);
            //     return checked;
            // }

            // function finishlevel2(q, level1Result) {
            //     // Check that when user change answer of second question, the third question will be updated
            //     console.log("Visisble = " + visibleQuestions.length);
            //     while (visibleQuestions.length > 2) {
            //         hide(visibleQuestions.pop());
            //         // remove previous answer
            //         results.pop()
            //     }
            //     if (results.length == 2) {
            //         results.pop();
            //     }
            //     let id = q.getAttribute("id");
            //     let checked = q.elements[id].value;
            //     let idNumeric = id.substring(1);
            //     let newIndex = ((idNumeric + checked).toString(2))
            //     let newId = "c" + newIndex;
            //     let nextQuestion = document.getElementById(newId);
            //     display(nextQuestion);
            //     results.push(checked);
            //     visibleQuestions.push(nextQuestion);
            //     spreadEvents(l3Query, finishlevel3)
            //     return checked;
            // }

            // function finishlevel3(q) {
            //     if (results.length == 3) {
            //         results.pop();
            //     }
            //     let id = q.getAttribute("id");
            //     let checked = q.elements[id].value;
            //     results.push(checked);
            //     analyze(results)
            //     return checked;
            // }

            // function analyze(results) {

            //     let [answer1, answer2, answer3] = results;
            //     [answer1, answer2, answer3] = [parseInt(answer1), parseInt(answer2), parseInt(answer3)];
            //     let functionType = level2[answer1];
            //     let Dominant = functionType[answer2];
            //     let Auxiliary = level3[answer1 * 2 + answer2][answer3];
            //     let Tertiary = oppisites[Auxiliary];
            //     let Inferior = oppisites[Dominant];
            //     let function_stack = Dominant + Auxiliary //+ Tertiary + Inferior;
            //     persona.push(function_stack);
            //     console.log(function_stack);
            //     that.cognitive_stack = function_stack;
            //     return function_stack
            // }

            // spreadEvents("#c0", finishlevel1)

        }
    }

</script>

<style scoped>
    .register-container {
        margin-top: 20px;
    }

    h5 {
        text-align: left;
    }

</style>
