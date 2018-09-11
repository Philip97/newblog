var obj = new Vue({
    el: '#vueExtras',
    data: {
            total: {total: false},
            extrasText: {},
            inside_fridge: {check: false, value:"inside_fridge", text: "Inside Fridge"},
            inside_oven: {check: false, value:"inside_oven", text: "Inside oven"},
            garage_swept: {check: false, value:"garage_swept", text: "Garage Swept"},
            inside_cabinets: {check: false, value:"inside_cabinets", text: "Inside Cabinets"},
            laundry_wash_s_dry: {check: false, value:"laundry_wash_s_dry", text: "Laundry Wash & Dry"},
            bed_sheet_change: {check: false, value:"bed_sheet_change", text: "Bed sheet Change"},
            blinds_cleaning: {check: false, value:"blinds_cleaning", text: "Blinds Cleaning"},
            weekly: {value: "weekly", clicked: false, init: false},
            biweekly: {value: "biweekly", clicked: false, init: false},
            monthly: {value: "monthly", clicked: false, init: false},
            tr: true,
            initProp: 0,
            topLine: {visible: false}
        },
    methods: {
        useAxios(data){
            // console.log(data.check);
            data.check = !data.check;
            if(data.check){                                            //add
                // console.log('try add');
                // console.log(data.check);
                Vue.set(obj.extrasText, data.value, data.text);
                this.writeTopLine();
                axios.post('/extras', {
                    ajaxExtraSave: data.value
                })
                .then(function (response) {
                    obj.axiosResponse(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else {                                                   //delete
                // console.log('try delete');
                // console.log(data.check);
                Vue.delete(obj.extrasText, data.value);
                this.writeTopLine();
                axios.post('/extras', {
                    ajaxExtraDelete: data.value
                })
                .then(function (response) {
                    obj.axiosResponse(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        },
        axiosResponse(response) {
            Vue.set(obj.total, 'total', true);
            Vue.set(obj.total, 'curent', response.data.total[0]);
            Vue.set(obj.total, 'once', response.data.total[1]);
            Vue.set(obj.total, 'weekly', response.data.total[2]);
            Vue.set(obj.total, 'biweekly', response.data.total[3]);
            Vue.set(obj.total, 'monthly', response.data.total[4]);
            Vue.set(obj.total, 'stripe', response.data.total[5]);
            Vue.set(obj.total, 'frequency', response.data.total[6]);
        },
        btnClick(data, e){
            e.preventDefault();
            Vue.set(obj.weekly, 'clicked', false);
            Vue.set(obj.biweekly, 'clicked', false);
            Vue.set(obj.monthly, 'clicked', false);
            data.clicked = !data.clicked;
            var keies = Object.keys(obj.extrasText);
            axios.post('/extras', {                                             //frequency_last: biweekly
                    extras: keies,
                    frequency_last: data.value
                })
                .then(function (response) {
                    obj.axiosResponse(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        addExtrasText(){
            if (obj.inside_fridge.check) {
                Vue.set(obj.extrasText, obj.inside_fridge.value, obj.inside_fridge.text);
            }
            if (obj.inside_oven.check) {
                Vue.set(obj.extrasText, obj.inside_oven.value, obj.inside_oven.text);
            }
            if (obj.garage_swept.check) {
                Vue.set(obj.extrasText, obj.garage_swept.value, obj.garage_swept.text);
            }
            if (obj.inside_cabinets.check) {
                Vue.set(obj.extrasText, obj.inside_cabinets.value, obj.inside_cabinets.text);
            }
            if (obj.laundry_wash_s_dry.check) {
                Vue.set(obj.extrasText, obj.laundry_wash_s_dry.value, obj.laundry_wash_s_dry.text);
            }
            if (obj.bed_sheet_change.check) {
                Vue.set(obj.extrasText, obj.bed_sheet_change.value, obj.bed_sheet_change.text);
            }
            if (obj.blinds_cleaning.check) {
                Vue.set(obj.extrasText, obj.blinds_cleaning.value, obj.blinds_cleaning.text);
            }
        },
        init() {
            if(this.initProp === 0) {
                if (this.weekly.init) {
                    Vue.set(this.weekly, 'clicked', true);
                    Vue.delete(this.weekly, 'init');
                }
                if (this.biweekly.init) {
                    Vue.set(this.biweekly, 'clicked', true);
                    Vue.delete(this.biweekly, 'init');
                }
                if (this.monthly.init) {
                    Vue.set(this.monthly, 'clicked', true);
                    Vue.delete(this.monthly, 'init');
                }
                this.initProp++;
            } else {
            }
        },
        writeTopLine(){
            var count = Object.keys(obj.extrasText).length;
            if(count >= 1){
                Vue.set(obj.topLine, 'visible', true);
            } else {
                Vue.set(obj.topLine, 'visible', false);
            }
        }
    }
})

obj.addExtrasText();
obj.writeTopLine();