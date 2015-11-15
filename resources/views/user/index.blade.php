@extends('user.layout')

@section('content')
    <form class="am-form">
        <div class="am-panel am-panel-default">
            <header class="am-panel-hd">
                <h3 class="am-panel-title">基本信息</h3>
            </header>
            <div class="am-panel-bd">

                <table class="am-table am-table-striped am-table-hover ">
                    <tr>
                        <td>昵称：</td>
                        <td><input type="text"></td>
                        <td>此项需要审核!</td>
                    </tr>
                    <tr>
                        <td>性别：</td>
                        <td>男</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>出生日期：</td>
                        <td>1989年12月12日</td>
                        <td>可联系管理员修改</td>
                    </tr>
                    <tr>
                        <td>身高：</td>
                        <td>
                            <select id="doc-select-1">
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
                            </select></td>
                        <td><span style="margin-left:10px;">厘米</span></td>
                    </tr>
                    <tr>
                        <td>学历：</td>
                        <td>
                            <select name="" id="">
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
                        <td>婚姻状况：</td>
                        <td>
                            <select name="" id="">
                                <option value="1">未婚</option>
                                <option value="2">离异</option>
                                <option value="3">丧偶</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>月薪：</td>
                        <td>
                            <select name="" id="">
                                <option value="1">2000元以下</option>
                                <option value="2">2000元～5000元</option>
                                <option value="3">5000元～10000元</option>
                                <option value="4">10000元～2000元</option>
                                <option value="5">20000元～50000元</option>
                                <option value="6">50000元以上</option>
                            </select>
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