var ajax = {
	url:null ,
	type:'get',
	params:{},
	form:null,

	
	setForm:function(formId){
		this.form = $("#"+formId);
		return this;
	},
	getForm:function(){
		return this.form;
	},
	setUrl:function(url){
		this.url = url;
		return this;
	},
	getUrl:function(){
		return this.url;
	},
	setMethod:function(method){
		this.type = method;
		return this;
	},
	getMethod:function(){
		return this.type;
	},
	setParams:function(params){
		this.params = params;
		return this;
	},
	getParams:function(key = null){
		if(key === null){
			return this.params;
		}
		if(this.params[key] === undefined){
			return null;
		}
		return this.params[key];
	},
	prepareRequestSettings: function(){
		if(this.getForm()){
		console.log(this.getForm().serializeArray());
			this.setMethod(this.getForm().attr("method"));
			this.setParams(this.getForm().serializeArray());
		}
	},
	resetRequestSettings:function(){
		this.setParams({});
		this.setMethod('get');
		return this;
	},
	call:function(){
		let self = this;
		this.prepareRequestSettings();
		$.ajax({
			url:this.getUrl(),
			type:this.getMethod(),
			data:this.getParams(),
			dataType:'json'
		}).done(function(response){
			$("#"+response.element).html(response.html);
			self.resetRequestSettings();
		})
	}
};