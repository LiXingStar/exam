<template>
    <div>
        <el-table
                :data="tableData5"
                style="width: 100%">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <el-form label-position="left" inline class="demo-table-expand">
                        <el-form-item label="商品名称">
                            <span>{{ props.row.name }}</span>
                        </el-form-item>
                        <el-form-item label="所属店铺">
                            <span>{{ props.row.shop }}</span>
                        </el-form-item>
                        <el-form-item label="商品 ID">
                            <span>{{ props.row.id }}</span>
                        </el-form-item>
                        <el-form-item label="店铺 ID">
                            <span>{{ props.row.shopId }}</span>
                        </el-form-item>
                        <el-form-item label="商品分类">
                            <span>{{ props.row.category }}</span>
                        </el-form-item>
                        <el-form-item label="店铺地址">
                            <span>{{ props.row.address }}</span>
                        </el-form-item>
                        <el-form-item label="商品描述">
                            <span>{{ props.row.desc }}</span>
                        </el-form-item>
                    </el-form>
                </template>
            </el-table-column>
            <el-table-column
                    label="商品 ID"
                    prop="id">
            </el-table-column>
            <el-table-column
                    label="商品名称"
                    prop="name">
            </el-table-column>
            <el-table-column
                    label="描述"
                    prop="desc">
            </el-table-column>
        </el-table>
    </div>
</template>
<script>
    export default {
        name: 'rest',
        data: function () {
            return {
                tableData5: [
                    {
                        id: '1',
                        title: '这是一道题_A:1B:2C:3D:4',
                        type: '单选',
                        answer: 'A',
                        stage: 'js',
                        author:'张三'
                    },
                    {
                        id: '1',
                        title: '这是一道题_A:1B:2C:3D:4',
                        type: '单选',
                        answer: 'A',
                        stage: 'js',
                        author:'张三'
                    },
                    {
                        id: '2',
                        title: '这是2道题_A:1B:2C:3D:4',
                        type: '多选',
                        answer: 'A,B',
                        stage: 'HTML',
                        author:'张三'
                    },
                    {
                        id: '3',
                        title: '这是3道题',
                        type: '简答',
                        answer: '这是答案',
                        stage: 'js',
                        author:'张三'
                    },
                ]
            }
        },
        computed:{
            tableData(){
                /*
                * id title options  type answer stage author
                * id
                * title:''
                * */

                let tableData = [];
                this.tableData5.forEach(ele=>{
                    let result = ele.title.trim().split('_');
                    let title = result[0];
                    let options = [];
                    if(result[1]){

                    }else{
                        options = '';
                    }
                })
            }
        }
    }
</script>