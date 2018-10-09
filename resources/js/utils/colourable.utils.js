export const getClassForColour = colour => {
    switch (colour) {
        case 0:
            return "bg-white";
        case 1:
            return "bg-red";
        case 2:
            return "bg-orange";
        case 3:
            return "bg-yellow";
        case 4:
            return "bg-green";
        case 5:
            return "bg-teal";
        case 6:
            return "bg-blue";
        case 7:
            return "bg-indigo";
        case 8:
            return "bg-purple";
        case 9:
            return "bg-pink";
        case 10:
            return "bg-black";
        default:
            return 0;
    }
};
