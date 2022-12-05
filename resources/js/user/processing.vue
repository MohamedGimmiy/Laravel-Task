<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <textarea class="form form-control" v-model="htmlText" name="process" id="process" cols="30" rows="10"></textarea>
            </div>
            <div class="col-12 text-center">

                <button class="btn btn-success btn-lg" @click="processInput">Convert</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="insert">

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            htmlText: ''
        }
    },
    methods:{

        processInput(e){
            var numberToWords = require('number-to-words');

            // to insert into
            let parent = document.querySelector('#insert');


            let insertDom = new DOMParser().parseFromString(this.htmlText, 'text/html');


            //before inserting (selecting all divs)
            let allDivs = insertDom.documentElement.querySelectorAll('div');
            console.log(allDivs)
            allDivs.forEach((div, i) => {
                div.classList.add(numberToWords.toWords(i+1));
            });

            //inserting
            parent.appendChild(insertDom.documentElement);



/*             axios.post('http://localhost:8000/api/process', {
                'htmlText' : this.htmlText
            }).then(res=>{
                if(res.status == 200){
                    alert('page generated successfully' + res.data.number);
                    //this.htmlText = res.data.number
                }else{
                    alert('faild');
                }
            }); */
        }
    }
}
</script>

<style>

</style>
