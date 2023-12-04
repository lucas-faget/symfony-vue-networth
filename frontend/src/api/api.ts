import axios from 'axios';

const BASE_URL: string = "https://localhost:8000";
const USER_ENDPOINT: string = "/api/users";

export const fetchAllUsers = async () => {
    try {
        const response = await axios.get(BASE_URL + USER_ENDPOINT);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};

export const fetchUser = async (userId: string) => {
    try {
        const response = await axios.get(`${BASE_URL}${USER_ENDPOINT}/${userId}`);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};

export const fetchSimilarProfiles = async (userId: string) => {
    try {
        const response = await axios.get(`${BASE_URL}${USER_ENDPOINT}/${userId}/similar`);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};

export const fetchUserPosts = async (userId: string) => {
    try {
        const response = await axios.get(`${BASE_URL}${USER_ENDPOINT}/${userId}/posts`);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};
