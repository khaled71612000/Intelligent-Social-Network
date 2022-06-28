<template>
    <div>
        <div class="bg-container">
            <img :src='reactiveCover' style="width:100%;background-color:white;max-height:90vh;">
        </div>
        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-9 col-md-9 col-xl-8 content" id="test">
                    <div class="overview">
                        <span v-for="article, index in reactiveContent">
                            <h1 v-if='article.type == "header" '>
                                <br v-if='index != 0'>
                                {{article.text}}
                            </h1>
                            <h1 v-if='article.type == "subheader"' class="subheader">
                                <br>
                                {{article.text}}
                            </h1>
                            <p v-if='article.type == "paragraph"'>
                                <br>
                                {{article.text}}
                            </p>
                            <div v-if='article.type == "image"' class="text-center">
                                <br>
                                <img :src="'/images/insights/'+article.src" alt="">
                                <br>
                            </div>
                            <ul v-if='article.type == "list"'>
                                <br>
                                <li v-for='item in article.items'>{{item}}</li>
                            </ul>
                        </span>
                    </div>


                    <br>
                    <a @click="$router.go(-1)" class="btn btn-primary">Back</a>
                </div>
                <!-- <div class="col-lg-2 d-none d-lg-block"></div> -->
            </div>
        </div>

    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                content: [],
                cover:'',
                userPersonality: this.$route.params.userPersonality,
                friendPersonality: this.$route.params.friendPersonality
            }
        },
        created() {
            axios.get(`/api/insights/relationship/${this.userPersonality}/${this.friendPersonality}`).then(response => {
                if(response.data.state) {
                    this.content = response.data.insight.content;
                    this.cover = `/images/insights/${response.data.insight.cover}`;
                }
                
                // document.querySelector('#test').innerHTML = response.data.content
            });
        },
        computed: {


            reactiveContent() {
                return this.content;
            },
            reactiveCover() {
                return this.cover;
            }
        },

    }

</script>

<style scoped>

@font-face {
  font-family: "Playfair Display";
  src: local("Playfair Diaplay"),
   url('../../assets/fonts/PlayfairDisplay-VariableFont_wght.ttf') format("truetype");
}

    body {
        background-color: #f2f2f2;
    }

    .content {
        background-color: white;
        padding: 3em;
    }

    .bg-container {
        width: 100%;
    }



    h1 {
        color: #576071;
        font-weight: 600;
        font-family: 'Playfair Display';
    }

    .subheader {
        font-weight: 600;
        font-family: 'Playfair Display';
        font-size: 1.5rem;
    }


    p, li {
        font-size: 1.25em;
        color: #576071;
    }
    p {
        margin-bottom: 0em;
    }
    li {
        padding: 0.2em 0em;
    }
    .content img {
        max-width: 85%;
    }
 #wrapper {
    overflow-x: hidden;
 }

#sidebar-wrapper {
  position: sticky;
  top: 0;
  background-color: white;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

.fixed-sidebar {
    position:fixed;
    top:5%;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
  font-family: 'Playfair Display';
}


#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }


}

@media(max-width: 768px) {
    .navigation-sm-inline {
    display: inline;
    }
    .navigation-sm-inline > .navigation-item-sm-inline {
        display: inline;
    }
    .col-sidebar {
        margin-top: 2rem;
        margin-bottom: 2rem;
    }
    .list-group-flush > .list-group-item:last-child {
        border-bottom-width: 1px;
    }
}

@media(max-width: 457px) {
    .navigation-sm-inline {
    display: inline-block;
    }
    .navigation-sm-inline > .navigation-item-sm-inline {
        display: inline-block;
    }
}
</style>
