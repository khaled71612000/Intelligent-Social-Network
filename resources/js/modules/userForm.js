export const namespaced = true;

const getDefaultState = () => {
  return {
    firstname:'', lastname:'', email:'', phone:'', 
    password:'', confirmPassword:'', country:'', 
    dob:null, gender:"",
    test_answers:[null, null, null],
    hobbies:[], profilePic:null, fileBase64:''
	}
}

export const state = getDefaultState()

export const  mutations = {
    SET_FIRSTNAME(state, value) {
      state.firstname = value;
    },
    SET_LASTNAME(state, value) {
      state.lastname = value;
    },
    SET_EMAIL(state, value) {
      state.email = value;
    },
    SET_PASSWORD(state, value) {
      state.password = value;
    },
    SET_CONFIRM_PASSWORD(state, value) {
      state.confirmPassword = value;
    },
    SET_PHONE(state, value) {
      state.phone = value;
    },
    SET_COUNTRY(state, value) {
      state.country = value;
    },
    SET_DOB(state, value) {
      state.dob = value;
    },
    SET_GENDER(state, value) {
      state.gender = value;
    },
    SET_TEST_ANSWERS(state, value) {
        //state.test_answers = value;
        Vue.set(state, "test_answers", value)
    },
    SET_HOBBIES(state, value) {
        //state.hobbies = value;
        Vue.set(state, "hobbies", value)
    },
    SET_PROFILE_PIC(state, value) {
        state.profilePic = value;
    },
    SET_FILE_BASE64(state, value) {
      state.fileBase64 = value;
  },
    resetState(state) {
      // Merge rather than replace so we don't lose observers
      // Run on registeration form submission
      console.log("FORM CLEARED");
      Object.assign(state, getDefaultState());
    }
  }

export const actions = {

  }

export const getters = {
    getUserForm: state => {
      return state;
    },
    step1IsValid : state => { 
      let conditions = [
        state.firstname != '',
        state.lastname != '',
        state.email != '',
        state.phone != '',
        state.password != '',
        state.confirmPassword != '',
        state.country != '',
        state.dob != null
      ];
      return !conditions.includes(false);
    },
    step2IsValid: state => {
      return !state.test_answers.includes(null)
    },
    hobbiesAsString: state => {
      return state.hobbies.toString();
    }
  }