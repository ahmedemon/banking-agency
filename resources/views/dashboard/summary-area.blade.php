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
    <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
        <div class="label card-header bg-danger rounded-0 text-white">Investment</div>
        <div class="value text-center Amount countUp">{{ $report['investment'] }}</div>
        <div class="marquee pt-2 px-0">
            <marquee direction="left">বর্তমান বিনিয়োগ স্থিতি - The current investment status</marquee>
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
        <div class="label card-header bg-danger rounded-0 text-white">FDR deposited</div>
        <div class="value text-center Amount countUp">{{ $report['fdr_deposit'] }}</div>
        <div class="marquee pt-2 px-0">
            <marquee direction="left">ফিক্সড ডিপোজিট স্থিতি - Fixed deposit status</marquee>
        </div>
    </a>
</div>

<div class="col-sm-3 col-xxxl-3 text-center mb-3">
    <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
        <div class="label card-header bg-danger rounded-0 text-white">Current Account</div>
        <div class="value text-center Amount countUp">{{ $report['current_ac'] }}</div>
        <div class="marquee pt-2 px-0">
            <marquee direction="left">চলতি হিসাব স্থিতি - Current account status</marquee>
        </div>
    </a>
</div>

{{-- <div class="col-sm-3 col-xxxl-3 text-center mb-3">
    <a class="element-box el-tablo TitleH bg-light rounded-0 text-decoration-none" style="background:  " href="#">
        <div class="label card-header bg-danger rounded-0 text-white">Return on investment</div>
        <div class="value text-center Amount countUp">{{ $report['investment_return'] }}</div>
        <div class="marquee pt-2 px-0">
            <marquee direction="left">বিনিয়োগের লভ্যাংশ - The return on investment profit</marquee>
        </div>
    </a>
</div> --}}

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
