<template>
    <div>
        <el-form  ref="form" :model="form" label-width="80px"
                 style="padding:40px 30px 20px 20px;background: #ffffff;border-radius: 5px;box-shadow: 0 0 5px rgba(0,0,0,0.5)">
            <el-form-item label="id" >
                {{form.did}}
            </el-form-item>

            <el-form-item label="名称">
                <el-input v-model="form.dname"></el-input>
            </el-form-item>



            <el-form-item>
                <el-button type="primary" @click="onSubmit('form')">提交</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script>
    export default {
        name:'dirUpdate',
        data:function(){
          return {
              did:'',
              form:{
                  did:'1',
                  dname:'全栈'
              }
          }
        },
        mounted(){
            this.did = this.$route.query.did;
            this.$http.get('/home/dirQuery.php?did='+this.did).then(res=>{
                this.form = res.body;
            })
        }
    }
</script>
<style>

</style>