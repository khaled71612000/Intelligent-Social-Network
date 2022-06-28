<template>
    <div id="profile">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Self Awareness</h1>
                    <p class="lead mt-3">
                        Here, you'll know yourself better, understand others and rise your self awareness.
                        Learn how to develop your personality, solve relationships conflicts, communication best practices and handling different emotional states
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <InsightsCard
                    title="Personality Type"
                    description="Here, you'll know yourself better, understand others and rise your self awareness.
                        Learn how to develop your personality, solve relationships conflicts, communication best practices and handling different emotional states"
                    img="personality_type.jpg"
                    :self_related="true"
                    path="/insights/personality/"
                    :attribute="'personality'"
                    :user="user"
                    :friends_list="friends_list"
                    ></InsightsCard>
                </div>
                <!-- NAVBAR PADDING -->
                <div class="col-4">
                    <InsightsCard
                    title="Relationships Conflicts"
                    description="Here, you'll know yourself better, understand others and rise your self awareness.
                        Learn how to develop your personality, solve relationships conflicts, communication best practices and handling different emotional states"
                    img="relationship_conflicts.jpeg"
                    :self_related="false"
                    :path="'/insights/relationship/' + user.personality + '/'"
                    :attribute="'personality'"
                    :user="user"
                    :friends_list="friends_list"
                    ></InsightsCard>
                </div>
                
                <div class="col-4">
                    <InsightsCard
                    title="Learning Style"
                    description="Here, you'll know yourself better, understand others and rise your self awareness.
                        Learn how to develop your personality, solve relationships conflicts, communication best practices and handling different emotional states"
                    img="learning_style.jpg"
                    :self_related="true"
                    path="/insights/learning/"
                    :attribute="'learning_style'"
                    :user="user"
                    :friends_list="friends_list"
                    ></InsightsCard>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import InsightsCard from '../components/InsightsCard.vue';
    export default {
        components: {
            InsightsCard
        },
        data() {
            return {
                friends_list: this.$store.state.user.friends,
                user: this.$store.state.user
            }
        },
        created() {

        }

    }
</script>
 
<style>

</style>