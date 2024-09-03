
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" href="#" style="background: white;">
            <div class="label card-header bg-danger rounded-0 text-white">General savings</div>
            <div class="value text-center Amount countUp">{{ $report['general_savings'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান সঞ্চয় স্থিতি - current savings status </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" href="#" style="background:  ">
            <div class="label card-header bg-danger rounded-0 text-white">DPS</div>
            <div class="value text-center Amount countUp">{{ $report['monthly_savings'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান মাসিক সঞ্চয় স্থিতি - Current DPS status </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Investment</div>
            <div class="value text-center Amount countUp">{{ $report['investment'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান বিনিয়োগ স্থিতি - The current investment status</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Return on investment</div>
            <div class="value text-center Amount countUp">{{ $report['investment_return'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বিনিয়োগের লভ্যাংশ - The return on investment profit</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">FDR deposited</div>
            <div class="value text-center Amount countUp">{{ $report['fdr_deposit'] }}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ফিক্সড ডিপোজিট স্থিতি - Fixed deposit status</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Distributed FDR profit</div>
            <div class="value text-center Amount countUp">{{$report['fdr_profit_served']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ফিক্সড ডিপোজিটের প্রোফিট বিতরণ স্থিতি - Profit distribution status of fixed deposit</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Distributed DPS</div>
            <div class="value text-center Amount countUp">{{$report['total_monthly_savings_ac']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">মাসিক সঞ্চয়ের প্রোফিট বিতরণ স্থিতি - DPS profit distribution status</marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Total members</div>
            <div class="value text-center Amount countUp">{{$report['total_member']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ভর্তিকৃত মোট সদস্য - Total members admitted</marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Total area</div>
            <div class="value text-center Amount countUp">{{$report['total_area']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">মোট এরিয়া/কেন্দ্র/গ্রুপ - The total area / center / group
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Total Staff</div>
            <div class="value text-center Amount countUp">{{$report['total_staff']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">কর্মরত মোট স্ট্যাফ - Total staff working
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Total Branch</div>
            <div class="value text-center Amount countUp">{{$report['total_branch']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">মোট ব্রাঞ্চ - Total branch
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Savings Account</div>
            <div class="value text-center Amount countUp">{{$report['total_savings_ac']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান সঞ্চয়ী একাউন্ট/হিসাব - Current savings account
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">DPS AC</div>
            <div class="value text-center Amount countUp">{{$report['total_monthly_savings_ac']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">বর্তমান মাসিক সঞ্চয়ী একাউন্ট/ হিসাব - Current DPS account
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Total Director</div>
            <div class="value text-center Amount countUp">{{$report['total_director']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">মোট ডিরেক্টর/ পরিচালকের সংখ্যা - Total number of directors
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Male member</div>
            <div class="value text-center Amount countUp">{{$report['total_male_member']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ভর্তিকৃত মোট পুরুষ সদস্য - Total male members admitted
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Female member</div>
            <div class="value text-center Amount countUp">{{$report['total_female_member']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">ভর্তিকৃত মোট মহিলা সদস্য - Total female members admitted
                </marquee>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Inactive member</div>
            <div class="value text-center Amount countUp">{{$report['total_inactive_member']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left">নিষ্ক্রীয় সদস্য - Current Inactive members
                </marquee>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xxxl-3 text-center mb-3">
        <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
            <div class="label card-header bg-danger rounded-0 text-white">Total Outloan</div>
            <div class="value text-center Amount countUp">{{$report['total_outloan']}}</div>
            <div class="marquee pt-2 px-0">
                <marquee direction="left"> মোট আউটলোন একাউন্ট - Your Total Out Loan Accounts</marquee>
            </div>
        </a>
    </div>
