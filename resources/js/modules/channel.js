export const namespaced = true;

const getDefaultState = () => {
    return {
        
    }
}

export const state = getDefaultState()

export const  mutations = {
    SET_FIRSTNAME(state, value) {
      state.firstname = value;
    },

    resetState(state) {
      // Merge rather than replace so we don't lose observers
      // Run on registeration form submission
      Object.assign(state, getDefaultState());
    }
  }

export const actions = {

  }

export const getters = {
    getChannels: state => {
      return state;
    },

  }