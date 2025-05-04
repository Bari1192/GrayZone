import { defineStore } from "pinia";
import { ref } from "vue";
import { http } from "@utils/http.mjs";

export const useChatStore = defineStore("chats", () => {
  const message = ref(null);

  async function sendMessage(userMessage) {
    const data = { message: userMessage };
    try {
      const response = await http.post("/chats", data);
      message.value = response.data["válasz/reply"]; // !!! Itt kiolvasni
      return response.data["válasz/reply"]; // visszaadni a user-nek!
    } catch (err) {
      console.log(`Hiba az üzenet elküldése közben: ${err.message}`);
      message.value = `Hiba: ${err.message}`; // hibakezelés
    }
  }
  return {
    message,

    sendMessage,
  };
});
