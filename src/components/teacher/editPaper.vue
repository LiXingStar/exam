<template>
    <div>
        <el-form  ref="form" :model="form" label-width="80px"
                  style="padding:40px 30px 20px 20px;background: #ffffff;border-radius: 5px;box-shadow: 0 0 5px rgba(0,0,0,0.5)">
            <el-form-item label="试卷名称">
                <el-input v-model="form.pname"></el-input>
            </el-form-item>
            <el-form-item label="选择班级">
                <el-select v-model="form.cid" placeholder="请选择">
                    <el-option
                            v-for="item in options"
                            :key="item.cid"
                            :label="item.cname"
                            :value="item.cid">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit('form')">提交</el-button>
            </el-form-item>
        </el-form>

        <el-table
                :data="tableData"
                style="width: 100%"
                ref="multipleTable"
                @selection-change="handleSelectionChange" max-height="350"
        >
            <el-table-column
                    type="selection"
                    width="55">
            </el-table-column>
            <el-table-column type="expand">
                <template slot-scope="props">
                    <el-form label-position="left" inline class="demo-table-expand">
                        <el-form-item label="解析">
                            <span>{{ props.row.exp }}</span>
                        </el-form-item>
                        <br>

                        <div v-if="props.row.options">
                            <el-form-item label="选项">
                            </el-form-item>
                            <el-form-item v-for="item in props.row.options" :key="item">
                                <span>{{item}}</span>
                            </el-form-item>
                        </div>
                    </el-form>
                </template>
            </el-table-column>
            <el-table-column
                    label="tid"
                    prop="tid">
            </el-table-column>
            <el-table-column
                    label="类型"
                    prop="name">
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
                    label="分数"
                    prop="score">
            </el-table-column>
            <el-table-column
                    label="出题者"
                    prop="author">
            </el-table-column>
            <el-table-column
                    label="阶段"
                    prop="sname">
            </el-table-column>
        </el-table>

        <div style="margin-top: 20px">
            <el-button @click="reverseSelect">反选</el-button>
            <el-button @click="cancelSelect">取消选择</el-button>
            <el-button @click="addTest">添加</el-button>
        </div>
    </div>
</template>
<script>
    export  default {
        name:'editPaper',
        data:function(){
            return {
                pid:'',
                form :{
                    pname:'',
                    cid:'',
                    pid:''
                },
                options:[],
                tableData5:[],
                multipleSelection:[]
            }
        },
        computed: {
            tableData() {
                let tableData = [];
                this.tableData5.forEach(element => {
                    //{tid:element.tid,title:xx,options:'',name:'',answer:'',exp:''}
//                    '这2道测试题 ' 'A:1 B:2 C:3 D:4'
                    let v = element.title.split('_');
                    let title = v[0];
                    let options = [];
                    if (v[1]) {
                        let arr = v[1].split('|');
                        arr.forEach(ele => {
                            options.push(ele);
                        })
                    } else {
                        options = '';
                    }

                    tableData.push({
                        tid: element.tid,
                        answer: element.answer,
                        exp: element.exp,
                        score: element.score,
                        author: element.author,
                        name: element.name,
                        sname: element.sname,
                        title,
                        options
                    })

                })
                return tableData;
            }
        },
        methods:{
           onSubmit(){
              this.$http.post('/home/paperUpdate',this.form)
           },
            addTest(){
               let ids = this.multipleSelection.map(ele=>ele.tid);
               this.$http.post('/home/addTest.php',{pid:this.pid,ids}).then(res=>{
                   console.log(res.body)
               })
            },
            handleSelectionChange(val) {
                this.multipleSelection = val;
            },
            cancelSelect(){
                this.$refs.multipleTable.clearSelection();
            },
            reverseSelect(){
                this.tableData.forEach(row => {
                    this.$refs.multipleTable.toggleRowSelection(row);
                });
            }
        },
        mounted(){
            this.pid = this.$route.query.pid;
            this.$http.get('/home/queryPaper.php?pid='+this.pid).then(res=>{
                this.form = res.body;
            });

            this.$http.get('/home/manageClasses.php').then(res=>{
                this.options = res.body;
            });

            this.$http.get('/home/manageTest.php').then(res=>{
                this.tableData5 = res.body;
            });
        }
    }
</script>
<style>

</style>