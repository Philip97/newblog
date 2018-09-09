var obj = new Vue({
    el: '#vueExtras',
    data: {
    //         total: {curent: "", once: "", weekly: "", biweekly: "", monthly: "", stripe: "", frequency: ""},
            total: {total: false},
            extrasText: {},
            extras1: {check: false, id: "extras1", value:"inside_fridge", text: "Inside Fridge"},
            extras2: {check: false, id: "extras2", value:"inside_oven", text: "Inside oven"},
            extras3: {check: false, id: "extras3", value:"garage_swept", text: "Garage Swept"},
            extras4: {check: false, id: "extras4", value:"inside_cabinets", text: "Inside Cabinets"},
            extras5: {check: false, id: "extras5", value:"laundry_wash_s_dry", text: "Laundry Wash & Dry"},
            extras6: {check: false, id: "extras6", value:"bed_sheet_change", text: "Bed sheet Change"},
            extras7: {check: false, id: "extras7", value:"blinds_cleaning", text: "Blinds Cleaning"},
            weekly: {value: "weekly", clicked: "ss"},
            biweekly: {value: "biweekly", clicked: "ss"},
            monthly: {value: "monthly", clicked: "ss"}
        },
    methods: {
        useAxios(data){
            // console.log(data);
            data.check = !data.check;
            if(data.check){                                            //add
                var val2 = data.value;
                var textrr3 = data.text;
                Vue.set(obj.extrasText, val2, textrr3);
                axios.post('/extras', {
                    ajaxExtraSave: data.value
                })
                .then(function (response) {
                    Vue.set(obj.total, 'total', true);
                    Vue.set(obj.total, 'curent', response.data.total[0]);
                    Vue.set(obj.total, 'once', response.data.total[1]);
                    Vue.set(obj.total, 'weekly', response.data.total[2]);
                    Vue.set(obj.total, 'biweekly', response.data.total[3]);
                    Vue.set(obj.total, 'monthly', response.data.total[4]);
                    Vue.set(obj.total, 'stripe', response.data.total[5]);
                    Vue.set(obj.total, 'frequency', response.data.total[6]);
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else {                                                   //delete
                console.log(data);
                var id = data.id;
                var val = data.value;
                console.log(val);
                Vue.delete(obj.extrasText, val);
                axios.post('/extras', {
                    ajaxExtraDelete: data.value
                })
                .then(function (response) {
                    Vue.set(obj.total, 'total', true);
                    Vue.set(obj.total, 'curent', response.data.total[0]);
                    Vue.set(obj.total, 'once', response.data.total[1]);
                    Vue.set(obj.total, 'weekly', response.data.total[2]);
                    Vue.set(obj.total, 'biweekly', response.data.total[3]);
                    Vue.set(obj.total, 'monthly', response.data.total[4]);
                    Vue.set(obj.total, 'stripe', response.data.total[5]);
                    Vue.set(obj.total, 'frequency', response.data.total[6]);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            // console.log(obj.id);
            // Vue.set(obj.data.id, 'check', !data.check);
            
        },
        btnClick(data){
            console.log(data)
        },
        addExtrasText(){
            if (obj.extras1.check) {
                Vue.set(obj.extrasText, obj.extras1.value, obj.extras1.text);
            }
            if (obj.extras2.check) {
                Vue.set(obj.extrasText, obj.extras2.value, obj.extras2.text);
            }
            if (obj.extras3.check) {
                Vue.set(obj.extrasText, obj.extras3.value, obj.extras3.text);
            }
            if (obj.extras4.check) {
                Vue.set(obj.extrasText, obj.extras4.value, obj.extras4.text);
            }
            if (obj.extras5.check) {
                Vue.set(obj.extrasText, obj.extras5.value, obj.extras5.text);
            }
            if (obj.extras6.check) {
                Vue.set(obj.extrasText, obj.extras6.value, obj.extras6.text);
            }
            if (obj.extras7.check) {
                Vue.set(obj.extrasText, obj.extras7.value, obj.extras7.text);
            }
        }
    }
})

obj.addExtrasText();