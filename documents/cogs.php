<table>
    <tbody>
        <tr>
            <td>
            <li>评测结果说明</li>
            <p>对于每个测试点，使用一个英文大写字母来表示该测试点的评测结果。</p>
            <table border="0">
                <tbody>
                    <tr>
                        <td>A</td>
                        <td>正确</td>
                    </tr>
                    <tr>
                        <td>W</td>
                        <td>错误</td>
                    </tr>
                    <tr>
                        <td>T</td>
                        <td>超过时间限制</td>
                    </tr>
                    <tr>
                        <td>E</td>
                        <td>运行时出错</td>
                    </tr>
                    <tr>
                        <td>O</td>
                        <td>没有输出文件</td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td>编译失败</td>
                    </tr>
                    <tr>
                        <td>S</td>
                        <td>没有找到源文件</td>
                    </tr>
                    <tr>
                        <td>[0-9]</td>
                        <td>获得部分得分(评测插件)</td>
                    </tr>
                    <tr>
                        <td>M</td>
                        <td>超过内存限制</td>
                    </tr>
                </tbody>
            </table>
            </td>
        </tr>
        <tr>
            <td>
            <li>为什么程序在我的电脑上能够正常运行，而在评测系统上不能?
            <ol>
                <li>评测系统建立在Linux下，编译器采用Gcc,G++,Free Pascal.评测系统在比较你的输出时默认采用忽略一切无效字符(空格,回车等)的策略。</li>
                <li>评测系统对你的程序内存的使用进行限制，默认为128MB，同时也对你的程序堆栈的使用进行限制。如果你的程序使用递归多达100,000层(甚至更多)，那么你的程序很可能运行时出错。</li>
                <li>对于C和C++语言，主函数一定要定义为int main()而不是void main()。如果你的程序运行正常结束，应向系统返回一个整型值0，而不是其他的东西。</li>
                <li>评测系统和你的电脑使用的内存安排方式可能不同。某些在你的电脑上没有经过初始化，理应为0的变量在评测系统上有可能并不如你所想的那样。</li>
                <li>Linux对内存的访问控制更为严格，因此在Windows上可能正常运行的无效指针或数组下标访问越界，在评测系统上无法运行。</li>
                <li>严重的内存泄露的问题很可能会引起系统的保护模块杀死你的进程。因此，凡是使用malloc(或calloc,realloc,new)分配而得的内存空间，请使用free(或delete)完全释放。</li>
                <li>在极少数情况下，你的程序运行错误(或编译失败)是因为你使用的某些变量与编译系统的变量名或函数名重复(例如:mmap,fork,pipe,exec,system,socket)。对于这种问题，你只好尝试替换某些可能与系统变量名重复的变量名。</li>
                <li>注意浮点运算，二进制浮点数运算的时候很有可能会造成意想不到的差异。例如a=0.00001+0.000001;</li>
                <li>如果你会两种以上的语言，不妨将你的代码“翻译”成另一种语言然后提交，或许在翻译的时候你会发现你的程序的错误。如果翻译以后能够正常通过，那么请仔细检查你原来的程序。</li>
                <li>如果以上都无法解决问题，请与管理员联系。或者联系作者：<a href="http://www.byvoid.com" target="_blank">CmYkRgB123</a><i>（作者已放弃此OJ，不再进行维护）</i>。</li>
            </ol>
            </li>
            </td>
        </tr>
        <tr>
            <td>
            <li>系统规则
            <ol>
                <li>已经结束并且不公布成绩的比赛自动隐藏。</li>
                <li>删除用户时，将删除该用户的所有提交记录、提交文件、评论、比赛记录。该用户创建的题目及比赛的所有权会转移到根管理员用户。</li>
                <li>删除比赛时，将删除所有关联该比赛的场次。</li>
                <li>删除比赛场次时，将删除所有关联该场次的提交记录和提交文件。</li>
            </ol>
            </li>
            </td>
        </tr>
    </tbody>
</table>
