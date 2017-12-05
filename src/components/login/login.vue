<template>
    <div>
        <div class="bg"></div>
        <div class="container">
            <div class="line bouncein">
                <div class="xs6 xm4 xs3-move xm4-move">
                    <div style="height:150px;"></div>
                    <div class="media media-y margin-big-bottom">
                    </div>

                    <el-form :rules="rules" ref="form" :model="form" label-width="80px"
                             style="padding:40px 30px 20px 20px;background: #ffffff;border-radius: 5px;box-shadow: 0 0 5px rgba(0,0,0,0.5)">
                        <el-form-item label="用户名" prop="name">
                            <el-input v-model="form.name"></el-input>
                        </el-form-item>

                        <el-form-item label="密码" prop="pass">
                            <el-input type="password" v-model="form.pass"></el-input>
                        </el-form-item>

                        <el-form-item label="角色" prop="type">
                            <el-radio-group v-model="form.type">
                                <el-radio label="manager">管理员</el-radio>
                                <el-radio label="teacher">教师</el-radio>
                                <el-radio label="student">学生</el-radio>
                            </el-radio-group>
                        </el-form-item>

                        <el-form-item>
                            <el-button type="primary" @click="onSubmit('form')">登陆</el-button>
                        </el-form-item>
                    </el-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'login',
        data() {
            return {
                form: {
                    name: '',
                    pass: '',
                    type: '',
                },
                rules:{
                    name:[
                        { required: true, message: '请输入用户名', trigger: 'blur' },
                        { min: 3, max: 8, message: '长度在 3 到 8 个字符', trigger: 'blur' }
                    ],
                    pass:[
                        { required: true, message: '请输入密码', trigger: 'blur' },
                        { min: 3, max: 8, message: '长度在 3 到 8 个字符', trigger: 'blur' }
                    ],
                    type: [
                        { required: true, message: '请选择角色', trigger: 'change' }
                    ],
                }
            }
        },
        methods: {
            onSubmit(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                         this.$http.post('/home/checklogin.php',this.form).then(res=>{
                             if(res.body == 1){
                                 this.$message({
                                     message: '恭喜你，登陆成功',
                                     type: 'success'
                                 });
                                 if(this.form.type=='manager'){
                                     this.$router.push('manage');
                                 }else if(this.form.type == 'teacher'){

                                 }else if(this.form.type=='student'){

                                 }

                             }else if(res.body == 2){
                                 this.$message({
                                     message: '密码错误',
                                     type: 'warning'
                                 });
                             }else if(res.body == 3){
                                 this.$message({
                                     message: '用户名不存在',
                                     type: 'warning'
                                 });
                             }
               })
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });

            }
        }
    }
</script>
<style>
    @import "../../assets/css/admin.css";
    @import "../../assets/css/pintuer.css";
</style>