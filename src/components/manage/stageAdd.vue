<template>
    <div>
        <el-form ref="form" :model="form" label-width="80px"
                 style="padding:40px 30px 20px 20px;background: #ffffff;border-radius: 5px;box-shadow: 0 0 5px rgba(0,0,0,0.5)">
            <el-form-item label="所属方向">
                <el-select v-model="form.did" placeholder="请选择">
                    <el-option
                            v-for="item in options"
                            :key="item.did"
                            :label="item.dname"
                            :value="item.did">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="阶段名称">
                <el-input v-model="form.sname"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit('form')">提交</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script>
    export default {
        name: 'dirAdd',
        data: function () {
            return {
                did: '',
                form: {
                    sname: '',
                    did: ''
                },
                options: []
            }
        },
        methods: {
            onSubmit() {
                this.$http.post('/home/stageAdd.php', this.form).then(res => {
                    if (res.body == 'ok') {
                        this.$message({
                            message: '插入成功',
                            type: 'success'
                        });
                        this.$router.push('manageStage');
                    } else if (res.body == 'error') {
                        this.$message({
                            message: '插入失败',
                            type: 'warning'
                        });
                    }
                })
            }

        },
        mounted() {
            this.$http.get('/home/manageDir.php').then(res => {
                this.options = res.body;
                console.log(this.options)
            })
        }
    }
</script>
<style>

</style>