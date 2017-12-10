<template>
    <div>
        <el-form  ref="form" :model="form" label-width="80px"
                 style="padding:40px 30px 20px 20px;background: #ffffff;border-radius: 5px;box-shadow: 0 0 5px rgba(0,0,0,0.5)">
            <el-form-item label="题型">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit('form')">提交</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script>
    export default {
        name:'dirAdd',
        data:function(){
          return {
              did:'',
              form:{
                  name:''
              }
          }
        },
        methods:{
            onSubmit(){
                this.$http.post('/home/typeAdd.php',this.form).then(res=>{
                    if(res.body=='ok'){
                        this.$message({
                            message: '插入成功',
                            type: 'success'
                        });
                        this.$router.push('manageType');
                    }else if(res.body=='error'){
                        this.$message({
                            message: '插入失败',
                            type: 'warning'
                        });
                    }
                })
            }

        }
    }
</script>
<style>

</style>