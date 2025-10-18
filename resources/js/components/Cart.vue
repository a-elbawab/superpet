<template>
    <div class="cart-container" :style="{ backgroundColor: 'red', color: 'white', padding: '20px', borderRadius: '8px' }">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul>
                    <li class="d-flex align-items-center border-bottom p-2 mb-3">
                        <img src="https://via.placeholder.com/50x50" alt="product" />
                        <div class="content ps-3">
                            <h5>Product Name</h5>
                            <p>Quantity x Price</p>
                        </div>
                    </li>
                    <li v-for="(item, index) in cartItems" :key="index" class="d-flex align-items-center border-bottom p-2 mb-3 position-relative">
                        <img :src="item.image" alt="product" />
                        <span class="position-absolute close-btn" @click="removeFromCart(index)">
                            <i class="fa-solid fa-xmark"></i>
                        </span>
                        <div class="content ps-3">
                            <h5>{{ item.name }}</h5>
                            <p>{{ item.quantity }} x {{ item.price }} L.E</p>
                        </div>
                    </li>
                </ul>
                <div class="cust d-flex justify-content-between align-items-center p-3 mb-3">
                    <span>Total:</span>
                    <span>{{ totalPrice }} L.E</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a class="view" href="/cart.html">VIEW CART</a>
                    <button class="checkout">CHECKOUT</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cartItems: [], // قائمة المنتجات في العربة
        };
    },
    computed: {
        totalPrice() {
            return this.cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
        },
    },
    methods: {
            greet: function () {
                alert('Hello !')
        },
        carting(product) {

            console.log("Hi there");

            const existingProduct = this.cartItems.find(item => item.name === product.name);
            if (existingProduct) {
                existingProduct.quantity += product.quantity; // زيادة الكمية إذا كان المنتج موجودًا
            } else {
                this.cartItems.push(product); // إضافة المنتج إلى العربة
            }
        },
        removeFromCart(index) {
            this.cartItems.splice(index, 1); // إزالة المنتج من العربة
        },
    },
};
</script>

<style scoped>
.cart-container {
    background-color: red; /* جعل الخلفية حمراء */
    color: white; /* تغيير لون النص ليكون مرئيًا */
    padding: 20px; /* إضافة بعض الهوامش */
    border-radius: 8px; /* إضافة زوايا مدورة */
}
</style>
