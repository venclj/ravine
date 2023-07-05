class JTV_DayCountDown extends HTMLSpanElement {
    constructor(){
        super();
        this.date = new Date();
        this.paramUpdateInMs = 3000;
        this.cntValue = 0;
        this.timeoutPointer = 0;
        this.updateCallback = function (cntValue){
            console.log("Counter value is "+cntValue);
        }
        console.log(this.date, this.hasAttribute('date'), this.getAttribute('date'));
        if (this.hasAttribute('date')){
            this.date = new Date(this.getAttribute('date'));
        }
        this.timeoutPointer = setTimeout(this.updateCounter.bind(this), this.paramUpdateInMs);
    }
    updateCounter (){
        this.cntValue = parseInt(Math.floor((this.date.getTime())-new Date().getTime())/(24*3600*1000));
        if (this.updateCallback){
            this.updateCallback(this.cntValue);
        }
        this.innerHTML = this.cntValue;
    }
}

customElements.define("day-cnt-down", JTV_DayCountDown, {extends: "span"});

{/* <p class="ravhp-beforestart-label" style="font-size:1.5rem">do závodu zbývá už jen</p>
<span class="ravhp-counter-to-start" data-start="2023-04-04">00</span>
<p class="ravhp-counter-day-label">dnů</p>
<script>
setTimeout(function(){jQuery(".ravhp-counter-to-start").each(function(){
    let cnter=jQuery(this)[0];
    let dlbl=jQuery('.ravhp-counter-day-label')[0];
    let cnt=parseInt(Math.floor((new Date(jQuery(this).attr('data-start')).getTime())-new Date().getTime())/(24*3600*1000));
    cnter.innerHTML=cnt;
    if(cnt==1||cnt==-1) dlbl.innerHTML='den'
    else if(cnt>1&&cnt<5) dlbl.innerHTML='dny'
    else dlbl.innerHTML='dnů';
})},3000)
</script> */}