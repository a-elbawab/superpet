/**
 * Payment Method Validator for Frontend
 * 
 * BUSINESS RULES:
 * 1. If delivery_method = "delivery":
 *    - If city_id = ALEXANDRIA_CITY_ID (Alexandria): allow COD, Online, and Visa on Delivery
 *    - Otherwise: allow only Online (Visa)
 * 2. If delivery_method is NOT "delivery": allow ALL payment methods
 */

// Payment Method Constants (must match backend Order model)
export const PAYMENT_METHODS = {
    CASH_ON_DELIVERY: 1,
    ONLINE: 2,
    VISA_ON_DELIVERY: 3,
};

// Delivery Method Constants
export const DELIVERY_METHODS = {
    PICKUP: 'pickup',
    DELIVERY: 'delivery',
};

// Alexandria city ID
const ALEXANDRIA_CITY_ID = 24;

/**
 * Get allowed payment methods based on delivery method and city ID.
 * 
 * @param {string} deliveryMethod - The delivery method ('delivery' or 'pickup')
 * @param {number|null} cityId - The city ID
 * @returns {number[]} Array of allowed payment method IDs
 */
export function getAllowedPaymentMethods(deliveryMethod, cityId = null) {
    // Rule 2: If delivery method is NOT "delivery", allow all payment methods
    if (deliveryMethod !== DELIVERY_METHODS.DELIVERY) {
        return [
            PAYMENT_METHODS.CASH_ON_DELIVERY,
            PAYMENT_METHODS.ONLINE,
            PAYMENT_METHODS.VISA_ON_DELIVERY,
        ];
    }

    // Rule 1: If delivery method IS "delivery"
    if (deliveryMethod === DELIVERY_METHODS.DELIVERY) {
        // Alexandria: allow COD, Online, and Visa on Delivery
        if (cityId === ALEXANDRIA_CITY_ID) {
            return [
                PAYMENT_METHODS.CASH_ON_DELIVERY,
                PAYMENT_METHODS.ONLINE,
                PAYMENT_METHODS.VISA_ON_DELIVERY,
            ];
        }
        
        // Other cities: allow only Online (Visa)
        return [
            PAYMENT_METHODS.ONLINE,
        ];
    }

    // Default: allow all
    return [
        PAYMENT_METHODS.CASH_ON_DELIVERY,
        PAYMENT_METHODS.ONLINE,
        PAYMENT_METHODS.VISA_ON_DELIVERY,
    ];
}

/**
 * Check if a specific payment method is allowed.
 * 
 * @param {number} paymentMethodId - The payment method ID
 * @param {string} deliveryMethod - The delivery method
 * @param {number|null} cityId - The city ID
 * @returns {boolean}
 */
export function isPaymentMethodAllowed(paymentMethodId, deliveryMethod, cityId = null) {
    const allowedMethods = getAllowedPaymentMethods(deliveryMethod, cityId);
    return allowedMethods.includes(paymentMethodId);
}

/**
 * Get payment method names (you can customize or fetch from API).
 * 
 * @returns {Object}
 */
export function getPaymentMethodNames() {
    return {
        [PAYMENT_METHODS.CASH_ON_DELIVERY]: 'Cash on Delivery',
        [PAYMENT_METHODS.ONLINE]: 'Online Payment (Visa)',
        [PAYMENT_METHODS.VISA_ON_DELIVERY]: 'Visa on Delivery',
    };
}

/**
 * Get allowed payment methods with their names.
 * 
 * @param {string} deliveryMethod - The delivery method
 * @param {number|null} cityId - The city ID
 * @returns {Array<{id: number, name: string}>}
 */
export function getAllowedPaymentMethodsWithNames(deliveryMethod, cityId = null) {
    const allowedMethodIds = getAllowedPaymentMethods(deliveryMethod, cityId);
    const methodNames = getPaymentMethodNames();
    
    return allowedMethodIds.map(id => ({
        id,
        name: methodNames[id] || `Payment Method ${id}`,
    }));
}

/**
 * Fetch allowed payment methods from the backend API (recommended for production).
 * 
 * @param {string} deliveryMethod - The delivery method
 * @param {number|null} areaId - The area ID
 * @param {number|null} cityId - The city ID
 * @returns {Promise<Object>}
 */
export async function fetchAllowedPaymentMethods(deliveryMethod, areaId = null, cityId = null) {
    try {
        const params = new URLSearchParams({
            delivery_method: deliveryMethod,
        });
        
        if (areaId) params.append('area_id', areaId);
        if (cityId) params.append('city_id', cityId);
        
        const response = await fetch(`/api/orders/allowed-payment-methods?${params.toString()}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
        });
        
        if (!response.ok) {
            throw new Error('Failed to fetch allowed payment methods');
        }
        
        return await response.json();
    } catch (error) {
        console.error('Error fetching allowed payment methods:', error);
        // Fallback to client-side validation
        return {
            success: false,
            data: {
                allowed_payment_methods: getAllowedPaymentMethods(deliveryMethod, cityId),
            },
        };
    }
}

export default {
    PAYMENT_METHODS,
    DELIVERY_METHODS,
    getAllowedPaymentMethods,
    isPaymentMethodAllowed,
    getPaymentMethodNames,
    getAllowedPaymentMethodsWithNames,
    fetchAllowedPaymentMethods,
};

