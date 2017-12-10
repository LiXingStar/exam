<template>
    <div>
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> 试题列表</strong></div>
            <div class="padding border-bottom">
                <router-link  class="button border-yellow" :to="{name:'testAdd'}" ><span class="icon-plus-square-o"></span> 添加试题</router-link>
            </div>
        <el-table
                :data="tableData"
                style="width: 100%">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <el-form label-position="left" inline class="demo-table-expand">
                        <div v-if="props.row.options">
                            <el-form-item label="选项"></el-form-item>
                            <el-form-item  v-for="(item,$index) in props.row.options" :key="$index">
                                <span>{{ item.key }}:</span>
                                <span>{{ item.value }}</span>
                            </el-form-item>
                        </div>
                    </el-form>
                </template>
            </el-table-column>
            <el-table-column
                    label="试题 ID"
                    prop="id">
            </el-table-column>
            <el-table-column
                    label="类型"
                    prop="type">
            </el-table-column>
            <el-table-column
                    label="题干"
                    prop="title">
            </el-table-column>
            <el-table-column
                    label="答案"
                    prop="answer">
            </el-table-column>
            <el-table-column
                    label="阶段"
                    prop="sname">
            </el-table-column>
        </el-table>
        </div>
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
                        title: '这是一道题_A:这是一个选项,B:这是2个选项,C:这是3个选项,D:这是4个选项',
                        type: '单选',
                        answer: 'A',
                        stage: 'js',
                        author:'张三'
                    },
                    {
                        id: '1',
                        title: '这是一道题_A:1,B:2,C:3,D:4',
                        type: '单选',
                        answer: 'A',
                        stage: 'js',
                        author:'张三'
                    },
                    {
                        id: '2',
                        title: '这是2道题_A:1,B:2,C:3,D:4',
                        type: '多选',
                        answer: 'A,B',
                        stage: 'html',
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
                       let o = result[1].split(/,/);
                       o.forEach(element=>{
                           let key = element.split(':')[0];
                           let value = element.split(':')[1];
                           options.push({key,value});
                       })
                    }else{
                        options = '';
                    }
                    tableData.push({id:ele.id,title,options,answer:ele.answer,sname:ele.sname,author:ele.author,type:ele.type})
                })
               console.log(tableData)
                return tableData;
            }
        },
        mounted(){
            this.$http.get('/home/test.php').then(res=>{
              this.tableData5 =  res.body
            })
        }
    }
</script>