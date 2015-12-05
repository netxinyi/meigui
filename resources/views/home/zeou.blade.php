@extends('home.layout')

@section('content')

    <form class="am-form">
        <div class="am-panel am-panel-default">
            <header class="am-panel-hd">
                <h3 class="am-panel-title">择偶条件</h3>
            </header>
            <div class="am-panel-bd">
                <table class="am-table am-table-striped am-table-hover " id="zeou_table">
                    <tr>
                        <td>年龄：{{User()->object->age_start}}</td>
                        <td>
                            <div class="zeou_table_select_n_left">
                                <select class="zeou_table_select" name="age_start">
                                     <?php 
                                        for ($x=18; $x<=99; $x++) {
                                            if(User()->object->age_start == $x){
                                                echo '<option value=" '.$x.'" selected="selected">'.$x.'岁</option>';
                                            }else{
                                                echo '<option value=" '.$x.'">'.$x.'岁</option>';
                                            }
                                        } 
                                     ?>
                                </select>
                            </div>
                            <div class="zeou_table_select_n_left"><span>&nbsp &nbsp至 &nbsp &nbsp</span></div>
                            <div class="zeou_table_select_n_left">
                                <select class="zeou_table_select" name="age_end">
                                    <?php 
                                        for ($x=18; $x<=99; $x++) {
                                            if(User()->object->age_end == $x){
                                                echo '<option value=" '.$x.'" selected="selected">'.$x.'岁</option>';
                                            }else{
                                                echo '<option value=" '.$x.'">'.$x.'岁</option>';
                                            }
                                        } 
                                     ?>
                                </select>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>婚姻状况：</td>
                        <td>
                            <select name="marriage"  class="zeou_table_select">
                                @foreach(App\Enum\User::$marriageLang as $key=>$val)
                                    @if(User()->object->marriage == $key)
                                        <option value="{{$key}}" selected="selected">{{$val}}</option>
                                    @else
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>居住情况：</td>
                        <td>
                            <select name=""  class="zeou_table_select">
                                
                                 @foreach(App\Enum\User::$houseLang as $key=>$val)
                                    @if(User()->object->house == $key)
                                        <option value="{{$key}}" selected="selected">{{$val}}</option>
                                    @else
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>籍贯：</td>
                        <td>
                            <select name=""  class="zeou_table_select">
                                <option value="不限">不限</option>
                                <option value="北京">北京</option>
                                <option value="上海">上海</option>
                                <option value="广州">广州</option>
                                <option value="深圳">深圳</option>
                                <option value="重庆">重庆</option>
                                <option value="天津">天津</option>
                                <option value="广东">广东</option>
                                <option value="江苏">江苏</option>
                                <option value="浙江">浙江</option>
                                <option value="四川">四川</option>
                                <option value="福建">福建</option>
                                <option value="山东">山东</option>
                                <option value="湖北">湖北</option>
                                <option value="河北">河北</option>
                                <option value="山西">山西</option>
                                <option value="内蒙古">内蒙古</option>
                                <option value="辽宁">辽宁</option>
                                <option value="吉林">吉林</option>
                                <option value="黑龙江">黑龙江</option>
                                <option value="安徽">安徽</option>
                                <option value="江西">江西</option>
                                <option value="河南">河南</option>
                                <option value="湖南">湖南</option>
                                <option value="广西">广西</option>
                                <option value="海南">海南</option>
                                <option value="贵州">贵州</option>
                                <option value="云南">云南</option>
                                <option value="西藏">西藏</option>
                                <option value="陕西">陕西</option>
                                <option value="甘肃">甘肃</option>
                                <option value="青海">青海</option>
                                <option value="宁夏">宁夏</option>
                                <option value="新疆">新疆</option>

                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>学历：</td>
                        <td>
                            <select name=""  class="zeou_table_select">
                                <option value="1">硕士</option>
                                <option value="2">博士</option>
                                <option value="3">本科</option>
                                <option value="4">大专</option>
                                <option value="5">高中</option>
                                <option value="6">初中</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>有无孩子：</td>
                        <td>
                            <select name=""  class="zeou_table_select">
                                <option value="1">没有</option>
                                <option value="2">有，我们住在一起</option>
                                <option value="3">有，我们偶尔一起住</option>
                                <option value="4">有，但不在身边</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>月薪：</td>
                        <td>
                            <div class="zeou_table_select_n_left">
                                <select  class="zeou_table_select">
                                    <option value="不限">不限</option>
                                    <option value="1000">1000</option>
                                    <option value="3000">3000</option>
                                    <option value="5000">5000</option>
                                    <option value="8000">8000</option>
                                    <option value="10000">10000</option>
                                    <option value="20000">20000</option>
                                    <option value="50000">50000</option>
                                </select>
                            </div>
                            <div class="zeou_table_select_n_left"><span>&nbsp &nbsp至 &nbsp &nbsp</span></div>
                            <div class="zeou_table_select_n_left">
                                <select  class="zeou_table_select">
                                    <option value="不限">不限</option>
                                    <option value="1000">1000</option>
                                    <option value="3000">3000</option>
                                    <option value="5000">5000</option>
                                    <option value="8000">8000</option>
                                    <option value="10000">10000</option>
                                    <option value="20000">20000</option>
                                    <option value="50000">50000</option>
                                </select>
                            </div>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>身高：</td>
                        <td>
                            <div class="zeou_table_select_n_left">
                                <select  class="zeou_table_select">
                                    <option value="130">130</option>
                                    <option value="131">131</option>
                                    <option value="132">132</option>
                                    <option value="133">133</option>
                                    <option value="134">134</option>
                                    <option value="135">135</option>
                                    <option value="136">136</option>
                                    <option value="137">137</option>
                                    <option value="138">138</option>
                                    <option value="139">139</option>
                                    <option value="140">140</option>
                                    <option value="141">141</option>
                                    <option value="142">142</option>
                                    <option value="143">143</option>
                                    <option value="144">144</option>
                                    <option value="145">145</option>
                                    <option value="146">146</option>
                                    <option value="147">147</option>
                                    <option value="148">148</option>
                                    <option value="149">149</option>
                                    <option value="150">150</option>
                                    <option value="151">151</option>
                                    <option value="152">152</option>
                                    <option value="153">153</option>
                                    <option value="154">154</option>
                                    <option value="155">155</option>
                                    <option value="156">156</option>
                                    <option value="157">157</option>
                                    <option value="158">158</option>
                                    <option value="159">159</option>
                                    <option value="160">160</option>
                                    <option value="161">161</option>
                                    <option value="162">162</option>
                                    <option value="163">163</option>
                                    <option value="164">164</option>
                                    <option value="165">165</option>
                                    <option value="166">166</option>
                                    <option value="167">167</option>
                                    <option value="168">168</option>
                                    <option value="169">169</option>
                                    <option value="170">170</option>
                                    <option value="171">171</option>
                                    <option value="172">172</option>
                                    <option value="173">173</option>
                                    <option value="174">174</option>
                                    <option value="175">175</option>
                                    <option value="176">176</option>
                                    <option value="177">177</option>
                                    <option value="178">178</option>
                                    <option value="179">179</option>
                                    <option value="180">180</option>
                                    <option value="181">181</option>
                                    <option value="182">182</option>
                                    <option value="183">183</option>
                                    <option value="184">184</option>
                                    <option value="185">185</option>
                                    <option value="186">186</option>
                                    <option value="187">187</option>
                                    <option value="188">188</option>
                                    <option value="189">189</option>
                                    <option value="190">190</option>
                                    <option value="191">191</option>
                                    <option value="192">192</option>
                                    <option value="193">193</option>
                                    <option value="194">194</option>
                                    <option value="195">195</option>
                                    <option value="196">196</option>
                                    <option value="197">197</option>
                                    <option value="198">198</option>
                                    <option value="199">199</option>
                                    <option value="200">200</option>
                                    <option value="201">201</option>
                                    <option value="202">202</option>
                                    <option value="203">203</option>
                                    <option value="204">204</option>
                                    <option value="205">205</option>
                                    <option value="206">206</option>
                                    <option value="207">207</option>
                                    <option value="208">208</option>
                                    <option value="209">209</option>
                                    <option value="210">210</option>
                                    <option value="211">211</option>
                                    <option value="212">212</option>
                                    <option value="213">213</option>
                                    <option value="214">214</option>
                                    <option value="215">215</option>
                                    <option value="216">216</option>
                                    <option value="217">217</option>
                                    <option value="218">218</option>
                                    <option value="219">219</option>
                                    <option value="220">220</option>
                                    <option value="221">221</option>
                                    <option value="222">222</option>
                                    <option value="223">223</option>
                                    <option value="224">224</option>
                                    <option value="225">225</option>
                                    <option value="226">226</option>
                                </select>
                            </div>
                            <div class="zeou_table_select_n_left"><span>&nbsp &nbsp至 &nbsp &nbsp</span></div>
                            <div class="zeou_table_select_n_left">
                                <select  class="zeou_table_select">
                                    <option value="130">130</option>
                                    <option value="131">131</option>
                                    <option value="132">132</option>
                                    <option value="133">133</option>
                                    <option value="134">134</option>
                                    <option value="135">135</option>
                                    <option value="136">136</option>
                                    <option value="137">137</option>
                                    <option value="138">138</option>
                                    <option value="139">139</option>
                                    <option value="140">140</option>
                                    <option value="141">141</option>
                                    <option value="142">142</option>
                                    <option value="143">143</option>
                                    <option value="144">144</option>
                                    <option value="145">145</option>
                                    <option value="146">146</option>
                                    <option value="147">147</option>
                                    <option value="148">148</option>
                                    <option value="149">149</option>
                                    <option value="150">150</option>
                                    <option value="151">151</option>
                                    <option value="152">152</option>
                                    <option value="153">153</option>
                                    <option value="154">154</option>
                                    <option value="155">155</option>
                                    <option value="156">156</option>
                                    <option value="157">157</option>
                                    <option value="158">158</option>
                                    <option value="159">159</option>
                                    <option value="160">160</option>
                                    <option value="161">161</option>
                                    <option value="162">162</option>
                                    <option value="163">163</option>
                                    <option value="164">164</option>
                                    <option value="165">165</option>
                                    <option value="166">166</option>
                                    <option value="167">167</option>
                                    <option value="168">168</option>
                                    <option value="169">169</option>
                                    <option value="170">170</option>
                                    <option value="171">171</option>
                                    <option value="172">172</option>
                                    <option value="173">173</option>
                                    <option value="174">174</option>
                                    <option value="175">175</option>
                                    <option value="176">176</option>
                                    <option value="177">177</option>
                                    <option value="178">178</option>
                                    <option value="179">179</option>
                                    <option value="180">180</option>
                                    <option value="181">181</option>
                                    <option value="182">182</option>
                                    <option value="183">183</option>
                                    <option value="184">184</option>
                                    <option value="185">185</option>
                                    <option value="186">186</option>
                                    <option value="187">187</option>
                                    <option value="188">188</option>
                                    <option value="189">189</option>
                                    <option value="190">190</option>
                                    <option value="191">191</option>
                                    <option value="192">192</option>
                                    <option value="193">193</option>
                                    <option value="194">194</option>
                                    <option value="195">195</option>
                                    <option value="196">196</option>
                                    <option value="197">197</option>
                                    <option value="198">198</option>
                                    <option value="199">199</option>
                                    <option value="200">200</option>
                                    <option value="201">201</option>
                                    <option value="202">202</option>
                                    <option value="203">203</option>
                                    <option value="204">204</option>
                                    <option value="205">205</option>
                                    <option value="206">206</option>
                                    <option value="207">207</option>
                                    <option value="208">208</option>
                                    <option value="209">209</option>
                                    <option value="210">210</option>
                                    <option value="211">211</option>
                                    <option value="212">212</option>
                                    <option value="213">213</option>
                                    <option value="214">214</option>
                                    <option value="215">215</option>
                                    <option value="216">216</option>
                                    <option value="217">217</option>
                                    <option value="218">218</option>
                                    <option value="219">219</option>
                                    <option value="220">220</option>
                                    <option value="221">221</option>
                                    <option value="222">222</option>
                                    <option value="223">223</option>
                                    <option value="224">224</option>
                                    <option value="225">225</option>
                                    <option value="226">226</option>
                                </select>
                            </div>
                            <divclass="zeou_table_select_n_left">&nbsp &nbsp厘米</div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="button" class="am-btn am-btn-danger dy_btn_color">保存信息</button>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
@stop