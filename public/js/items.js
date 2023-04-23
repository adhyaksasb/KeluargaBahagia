const posts = [];

const images = [
  "https://i.pinimg.com/originals/d0/1d/e7/d01de749de5a02603bfacf0b355a857b.jpg",
  "https://i.pinimg.com/564x/9a/d0/f2/9ad0f28361feb140180b91777d08c2d7.jpg",
  "https://dr.savee-cdn.com/things/5/e/68f35e1404e45961765299.gif",
  "https://i.pinimg.com/564x/19/c5/b5/19c5b5c88904c92aa19b9458ecfb8838.jpg",
  "https://i.pinimg.com/564x/3b/9c/eb/3b9ceb83e30176113134056b1b85147e.jpg",
  "https://i.pinimg.com/564x/fc/c2/f9/fcc2f9509583519a06fff646fce319cd.jpg",
  "https://i.pinimg.com/564x/15/e4/59/15e45960b3e5a088fedd26faf4700706.jpg",
  "https://i.pinimg.com/564x/af/3c/94/af3c94d8fe95756be8fc97e62e55ac10.jpg",
  "https://i.pinimg.com/564x/ed/8a/e6/ed8ae6b5ff391303c435d9006f24ac20.jpg",
];

let imageIndex = 0;

for (let i = 1; i <= 60; i++) {
  let item = {
    id: i,
    title: `Post ${i}`,
    date: `${i < 10 ? 0 : ""}${i}/10/2021 `,
    image: images[imageIndex],
  };
  posts.push(item);
  imageIndex++;
  if (imageIndex > images.length - 1) imageIndex = 0;
}

console.log(posts);
