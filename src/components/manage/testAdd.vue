<template>
    <div>
        <el-form ref="form" :model="form" label-width="80px"
                 style="padding:40px 30px 20px 20px;background: #ffffff;border-radius: 5px;box-shadow: 0 0 5px rgba(0,0,0,0.5)">
            <el-form-item label="所属阶段">
                <el-select v-model="form.sid" placeholder="请选择">
                    <el-option
                            v-for="item in options"
                            :key="item.sid"
                            :label="item.sname"
                            :value="item.sid">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="类型">
                <el-input v-model="form.type"></el-input>
            </el-form-item>

            <el-form-item label="题目">
                <textarea v-model="form.title" class="el-input__inner"></textarea>
            </el-form-item>
             <el-form-item label="答案">
                 <el-input v-model="form.answer"></el-input>
             </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit('form')">提交</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script>
    import ElFormItem from "../../../node_modules/element-ui/packages/form/src/form-item.vue";

    export default {
        components: {ElFormItem},
        name: 'teacherAdd',
        data: function () {
            return {
                did: '',
                form: {
                    title: '',
                    answer: '',
                    type:'',
                    sid:''
                },
                options: [],
            }
        },
        methods: {
            onSubmit() {
                let form =  this.form;
                this.$http.get('/home/testAdd.php', {params:this.form}).then(res => {
                    if (res.body == 'ok') {
                        this.$message({
                            message: '插入成功',
                            type: 'success'
                        });
                        this.$router.push('test');
                    } else if (res.body == 'error') {
                        this.$message({
                            message: '插入失败',
                            type: 'warning'
                        });
                    }
                })
            },
        },
        mounted() {
            this.$http.get('/home/manageStage.php').then(res => {
                this.options = res.body;
                console.log(this.options)
            })
        }
    }
</script>
<style>

</style>